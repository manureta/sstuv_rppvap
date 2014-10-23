var qcEP = {};

qcEP.getEditPanelControl = function(control) {
    control = $(control);
    while (control.parent().length) {
        control = control.parent();
        if (control.hasClass('qceditpanel') || control.hasClass('qdialogbox'))
            return control;
    }
    return null;
};

qcEP.confirmPostAjax = function(strControl){
    var editPanels = $('.qceditpanel');
    for(var index = 0 ; index < editPanels.length ; index++){
        if($('#' + editPanels[index].id).data('modified_controls').length){
            if(!qc.EditPanel.getEditPanelControl($('#' + strControl))){
                if(confirm(qcodo.confirmMessage)){
                    break;
                }
                return false;
            }
        }
    }
    return true;
};

qcEP.listTableChange = function(editPanelControlId, controlId){
    var editPanelControl = $('#' + editPanelControlId); 
    editPanelControl.data('modified_controls').push(controlId); 
    qc.EditPanel.UpdateButtons(editPanelControl, true);
};

qcEP.setChanged = function(event) {
    var editPanelControl = qc.EditPanel.getEditPanelControl(event.target);
    if (!editPanelControl) {
        console.log("ERROR en setChanged(). Se llamo a la funcion desde un control sin editPanelControl")
    }
    var arr = editPanelControl.data('modified_controls');
    if ($(event.target).attr('original_value') != qc.EditPanel.ControlGetValue(event.target)) {
        if (arr.indexOf(event.target.id) < 0)
            arr.push(event.target.id);
    }
    else {
        arr.remove(event.target.id);
    }
    editPanelControl.data('modified_controls', arr);
    qcodo.EditPanel.UpdateButtons(editPanelControl, arr.length > 0);
};

qcEP.UpdateButtons = function(editPanelControl, blnChanged) {
    var cancelButton = editPanelControl.find('.qccancelbutton')[0];
    if (!cancelButton) {
        console.log('el panel ' + editPanelControl.id + ' no tiene un QCancelButton (qc.EP.UpdateButtons)');
//        return;
    }
    if (blnChanged) {
        if (cancelButton) {
            var action = cancelButton.getAttribute('onclick_action');
            cancelButton.childNodes[1].textContent = cancelButton.getAttribute('data-cancel-text');
            cancelButton.setAttribute('onclick', 'if(confirm(qcodo.confirmMessage))' + action);
        }
        editPanelControl.find('.qcsavebutton').attr('disabled', false);
    }
    else {
        qc.EditPanel.ResetButtons(editPanelControl[0].id);
    }
};

// como los checkbox y radio no se comportan igual que los otros input, creo este metodo para que se encargue de obtener el valor de la manera que corresponada.
qcEP.ControlGetValue = function(control){
    control = $(control);
    if(control.attr('type')=='checkbox'){
        return (control.is(':checked')==true?"true":"false");
    }
    if(control.attr('type')=='radio'){
        return $('#'+ control[0].id + ':checked').val();
    }
    return control.val();
}

qcEP.Init = function(editId) {
    console.log('inicializo formulario ' + editId);
    var editPanelControl = $('#' + editId);
    editPanelControl.addClass('qceditpanel');
    editPanelControl.data('modified_controls', new Array());
    var controls = editPanelControl.find('input, textarea, button');
    controls.each(function() {
        $(this).attr('original_value', qc.EditPanel.ControlGetValue(this));
    });
    controls.on('change', qcodo.EditPanel.setChanged);
    var action = editPanelControl.find('.qccancelbutton').attr('onclick');
    editPanelControl.find('.qccancelbutton').attr('onclick_action', action);
    qcodo.EditPanel.ResetButtons(editId);
};

qcEP.ResetButtons = function(editId) {
    var editPanelControl = $('#' + editId);
    editPanelControl.find('.qcsavebutton').attr('disabled', 'disabled');
    var cancelButton = editPanelControl.find('.qccancelbutton')[0];
    if (!cancelButton) {
        console.log('el panel ' + editId + ' no tiene un QCancelButton (qc.EP.ResetButtons)');
        return;
    }
    cancelButton.childNodes[1].textContent = cancelButton.getAttribute('data-back-text');
    cancelButton.setAttribute('onclick', cancelButton.getAttribute('onclick_action'));
};

qcEP.ModalClose = function(lstControlId, editId, blnModified) {
    var lstControl = $("#" + lstControlId);
    var editPanelControl = $('#' + editId);

    if (blnModified) {
        editPanelControl.data("modified_controls").push(lstControlId);
        qcodo.EditPanel.UpdateButtons(editPanelControl, true);
    }
};

qcEP.GoToFirstErrorTab = function(){
    var tabParent = $('.tabbable');
    if(!tabParent.length)
        return;
    var tabIndex = -1;
    var tabContent = tabParent.find('.tab-content')[0];
    for( var i=0 ; i<tabContent.children.length ; i++){
        var tab = $(tabContent.children[i]);
        if(tab.find('.has-error').length){
            tabIndex = i;
            if(tab.hasClass('active'))
                return;
            break;
        }
    }
    if(tabIndex<0)
        return;
    tabParent.find('.nav-tabs')[0].children[tabIndex].children[0].click();
};


qcodo.EditPanel = qcEP;
qc.EP = qcEP;
