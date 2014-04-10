/*
*  Funcion para utilizar el reloj
*/
function startTime(){
      var meses = new Array ("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");

			var dia=new Date();
			var h=dia.getHours();
			var m=dia.getMinutes();
            var ampm = h >= 12 ? 'pm' : 'am';
			h = h % 12;
			h = h ? h : 12;
			
			



			m=checkTime(m);
document.getElementById('hora').innerHTML=dia.getDate()+" de "+meses[dia.getMonth()]+" de "+dia.getFullYear()+" "+h+":"+m+" "+ampm;
			t=setTimeout(function(){startTime()},500);
		}
			function checkTime(i){
				if (i<10){
			  i="0" + i;
			  }
			return i;
		}



/*
*    funcion para mostrar menu desplegable
*/


 function mostrar(id) {

      var e= document.getElementById(id);
      if(e.style.display == 'block'){
          e.style.display = 'none';
          
          }else{
            e.style.display = 'block';
         }
    }


 /*
 *  Funcion Ajax para mostrar contenido del form ya sea de usuario o de tipo de credito
 */
 
function showUser(str,tipo){

  if (window.XMLHttpRequest){
  // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  }else{
  // code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function(){

    if (xmlhttp.readyState==4 && xmlhttp.status==200){

       

      // Verificar el tipo de Form (Usuario o tipoCredito)

      if(tipo=="usuario"){
         // Obtener objeto Json

        var nombre=xmlhttp.responseText;
        var objetoJson=JSON.parse(nombre);
          //Form de tipo "AltaUsuario"

        var nombreUsuario=document.getElementById('nombreUsuario');
        var tipoUsuario=document.getElementById('tipoUsuario');
        var correoUsuario=document.getElementById('CorreoUsuario');

        nombreUsuario.value=objetoJson.nombre;
        tipoUsuario.value=objetoJson.TipoUsuario;
        correoUsuario.value=objetoJson.Correo;

        }else if(tipo=="tipoCredito"){
        // Form de tipo "TipoCredito"

           // Obtener objeto Json

        var nombre=xmlhttp.responseText;
        var objetoJson=JSON.parse(nombre);
          //Form de tipo "AltaUsuario"

        var nombreTipoCredito=document.getElementById('nombreTipoCredito');
        var DescripcionTipoCredito=document.getElementById('DescripcionTipoCredito');

        nombreTipoCredito.value=objetoJson.nombre;
        DescripcionTipoCredito.value=objetoJson.descripcion;


        }else if(tipo=="EliminarUsuario"){
          // Form de tipo "Eliminar usuarios"

          document.getElementById('slc_user').innerHTML=xmlhttp.responseText;

        } else if(tipo=="Credito"){
          document.getElementById('valorCredito').value=xmlhttp.responseText;
        }

      }

  }
  xmlhttp.open("GET","php/inputForm.php?str="+str+"&tipo="+tipo,true);
  xmlhttp.send();

}




  // Funcion ajax para filtros de la tabla Creditos
function tblfiltros(valor,tipo){
   if (window.XMLHttpRequest){
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  }else{
    // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function(){

    if (xmlhttp.readyState==4 && xmlhttp.status==200){

      // Verificar el tipo de filtro

      if (tipo=="Credito") {
        //Asignar contenido a la tabla
       document.getElementById('tblbody').innerHTML=xmlhttp.responseText;
         
      }

    }
      
  }
  xmlhttp.open("GET","php/funciones/filtros.php?valor="+valor+"&tipo="+tipo,true);
  xmlhttp.send();

 }

 // Funcion ajax de busqueda para la tabla Depositos

function busqueda (valor,tipo) {
   if (window.XMLHttpRequest){
  // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  }else{
    // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function(){

    if (xmlhttp.readyState==4 && xmlhttp.status==200){
      //Asignar contenidoa la tabla
    document.getElementById('tblbody').innerHTML=xmlhttp.responseText;

    }
      
  }
  xmlhttp.open("GET","php/funciones/filtros.php?valor="+valor+"&tipo="+tipo,true);
  xmlhttp.send();
  
}











