/////////////////////////////////////////////
// Control: Dialog Box functionality
/////////////////////////////////////////////

qcodo._DialogBoxes = new Array();

qcodo.registerDialogBox = function(strControlId, strTitle, strCloseControlId) {
    var myBootbox = bootbox.dialog({title: strTitle, message: qc.getW(strControlId)});
    qc.getC(strControlId).style.display = 'block';
    myBootbox.id = "bootbox_" + strControlId;
    $("#" + document.getElementById("Qform__FormId").value).append(myBootbox);
    $(".bootbox-close-button").on("click", function(e) {
        $("#" + strCloseControlId).click();
        e.stopPropagation();
        e.preventDefault();
    });
    qcodo._DialogBoxes.push(myBootbox);
    $("#"+strCloseControlId).data("editPanelControl",$("#"+strCloseControlId));
    var height = window.innerHeight - 130;
    $('.qdialogbox')[0].style.maxHeight = height + 'px';
    $('.qdialogbox')[0].style.overflowY = "auto";
    window.onresize = function(){
        var height = window.innerHeight - 130;
        $('.qdialogbox')[0].style.maxHeight = height + 'px';
    }
}

qcodo.hideDialogBox = function(strControlId) {
    for (var i = 0; i < qcodo._DialogBoxes.length; i++) {
        if (qcodo._DialogBoxes[i].id === "bootbox_" + strControlId) {
            $("#" + document.getElementById("Qform__FormId").value).append(qc.getW(strControlId));
            qcodo._DialogBoxes[i].modal("hide");
            qcodo._DialogBoxes.remove(qcodo._DialogBoxes[i]);
            break;
        }
    }
}

qc.regDB = qcodo.registerDialogBox;
qc.hideDB = qcodo.hideDialogBox;