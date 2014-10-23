//Settings Iniciales.
var ESP = new Array();
ESP[1] = "Por favor, ingrese los datos requeridos";
ESP[2] = "Nombre de Usuario";
ESP[3] = "Contraseña";
ESP[4] = "Acceder";
ESP[5] = "No recuerdo mi contraseña";
ESP[6] = "Solicitar credenciales para acceder";
ESP[7] = "Obtener nuevas credenciales";
ESP[8] = "Ingrese su e-mail para recibir instrucciones";
ESP[9] = "Email";
ESP[10] = "Enviar";
ESP[11] = "Volver";
ESP[12] = "Registración de nuevo usuario";
ESP[13] = "Re ingrese contraseña";
ESP[14] = "Estoy de acuerdo";
ESP[15] = "Terminos de usuario";
ESP[16] = "Limpiar";
ESP[17] = "Registrar";
ESP[18] = "Su navegador no acepta cookies. Debe configurarlo para que el mismo lo acepte. No puede iniciar sesión sin esta caracteristica.";
ESP[19] = "No se obtuvo informacion del servidor.";
ESP[20] = "El usuario no esta habilitado para el ingreso al sistema.";
ESP[21] = "Usuario o Clave incorrecto/s";
ESP[22] = "Se enviaron datos incorrectos. Llame al administrador del sitio si persiste el problema.";
ESP[23] = "Existe un error inesperado al procesar la solicitud. Comuniquese con el Administrador si persiste el problema.";
ESP[24] = "Debe especificar un nombre de usuario.";
ESP[25] = "Debe especificar una contraseña.";

var ENG = new Array();
ENG[1] = "Enter Username and Password";

var ITA = new Array();
ITA[1] = "Inserisci nome utente e password";

/* Idioma_determinarIdiomaNaveg
 * Determina el idioma del Navegador.
 * De acuerdo al navegador, puede suceder lo siguiente: es-ES, es-LA, es-AR.
 * Recomendable detectar el "es"
 * @returns {String|window.navigator.language|navigator.language|navigator.browserLanguage|window.navigator.browserLanguage}
 */
function Idioma_determinarIdiomaNaveg() {
    var idiomaNavegador = new String;
    if (navigator.language) {
        idiomaNavegador = navigator.language;
        // En este caso, el idioma devuelto puede contener el 
        // subcódigo de idioma (p.ej. "es-ES").
    } else {
        idiomaNavegador = navigator.browserLanguage;
        // En este caso, el idioma devuelto solo conteniene el 
        // código de idioma (p.ej. "es")
    }
    return idiomaNavegador;
}

/* Idioma_gMsj
 * Devuelve el mensaje del codigo de idioma seleccionado
 * @param {type} cod  = codigo de idioma
 * @returns {String|Idioma_gMsj.IDM}
 */
function Idioma_gMsj(codigo) {
    var mensaje;
    mensaje = (this.IDM[codigo] != null ? this.IDM[codigo] : "#ERROR_IDIOMA#");
    return mensaje;
}

/* Idioma_clearVolatileMsj
 * Borra un div determinado.
 * @param {type} div
 * @returns nothing
 */
function Idioma_clearVolatileMsj(div) {
    $("#" + div).html("&nbsp; ");
}

/* Idioma_volatileMsj
 * Pone un mensaje temporal en el div de duracion "segundos"
 * @param {type} div
 * @param {type} codigo
 * @param {type} segundos
 * @returns nothing
 */
function Idioma_volatileMsj(div, codigo, segundos) {
    $("#" + div).html(this.gMsj(codigo));
    setTimeout("Idioma_clearVolatileMsj('" + div + "')", (segundos * 1000));
}

/* Clase Idioma
 * 
 * @returns {Idioma}
 */
function Idioma() {
    this.IDM = new Array();
    this.gMsj = Idioma_gMsj;
    this.volatileMsj = Idioma_volatileMsj;
    //var str = Idioma_determinarIdiomaNaveg();
    this.IDM = jQuery.extend({}, ESP);
    Tool_DestruirArray(ESP);
    Tool_DestruirArray(ENG);
    Tool_DestruirArray(ITA);
}
oIdm = new Idioma();
