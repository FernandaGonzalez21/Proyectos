$(document).ready(function() {
alert("Ingreso a clientes");
var IdCliente, opcion;
opcion = 4;//listar
    
tablaProducto = $('#tablaCliente').DataTable({  
    "ajax":{            
        "url": "../model/cliente_controlador.php", 
        "method": 'POST', //usamos el metodo POST
        "data":{opcion:opcion}, //enviamos opcion 4 para que haga un SELECT
        "dataSrc":""
    },
    "columns":[
        {"data": "IdCliente"},
        {"data": "nombre"},
        {"data": "apellido1"},
        {"data": "apellido2"},
        {"data": "direccion"},
        {"data": "telefono"},
        {"data": "correoElectronico"},
        {"data": "RFC"},
        {"defaultContent": "<div class='text-center'><div class='btn-group'><button class='btn btn-primary btn-sm btnEditar'><i class='material-icons'>edit</i></button><button class='btn btn-danger btn-sm btnBorrar'><i class='material-icons'>delete</i></button></div></div>"}
    ]
});     

var fila; //captura la fila, para editar o eliminar
//submit para el Alta y Actualización
$('#formadd2').submit(function(e){      
alert("Enviando..");                    
    e.preventDefault(); //evita el comportambiento normal del submit, es decir, recarga total de la página
    IdCliente = $.trim($('#IdCliente').val());    
    nombre = $.trim($('#nombre').val());
    apellido1 = $.trim($('#apellido1').val());    
    apellido2 = $.trim($('#apellido2').val());    
    direccion = $.trim($('#direccion').val());
    telefono = $.trim($('#telefono').val());
    correoElectronico = $.trim($('#correoElectronico').val());
    RFC = $.trim($('#RFC').val());                           
        $.ajax({
          url: "../model/cliente_controlador.php",
          type: "POST",
          datatype:"json",    
          data: {opcion:opcion,IdCliente:IdCliente, nombre:nombre, apellido1:apellido1, apellido2:apellido2, direccion:direccion, telefono:telefono, correoElectronico:correoElectronico, RFC:RFC},   
          success: function(data) {
            //tablaproducto.ajax.reload(null, false);
            alert("Agregado");
           }
        });			        
    $('#agregar').modal('hide');											     			
});

//AJAX CON METODO GET
/* $.ajax({
          url: "../model/producto_controlador.php?IdCliente="+IdCliente+"&nombre"+nombre+"&apellido1"+apellido1+"&apellido2"+apellido2+"&direccion"+direccion,
          type: "GET",
          //datatype:"json",    
          //data: ,  //{IdCliente:IdCliente, nombre:nombre, apellido1:apellido1, apellido2:apellido2, direccion:direccion},   
          success: function(data) {
            tablaproducto.ajax.reload(null, false);
            alert("Agregado");
           }
        });                 
    $('#agregar').modal('hide');                                                            
});*/
        
 

//para limpiar los campos antes de dar de Alta una Persona
$("#btnNuevo").click(function(){
    opcion = 1; //alta           
    IdCliente=-1;
    $("#formadd2").trigger("reset");
    $(".modal-header").css( "background-color", "#17a2b8");
    $(".modal-header").css( "color", "white" );
    $(".modal-title").text("Registro de clientes");
    $('#agregar').modal('show');	    
});


//Editar        
$(document).on("click", ".btnEditar", function(){		        
    opcion = 2;//editar
    fila = $(this).closest("tr");	        
    IdCliente= parseInt(fila.find('td:eq(0)').text()); //capturo el ID		
    alert(IdCliente);          
    nombre = fila.find('td:eq(1)').text();
    alert(nombre);  
    apellido1 = fila.find('td:eq(2)').text();
    alert(apellido1);  
    apellido2 = fila.find('td:eq(3)').text();
    alert(apellido2);  
    direccion = fila.find('td:eq(4)').text();
    alert(direccion);
    telefono = fila.find('td:eq(5)').text();
    alert(telefono);
    correoElectronico = fila.find('td:eq(6)').text();
    alert(correoElectronico);
    RFC = fila.find('td:eq(7)').text();
    alert(RFC);  
    $("#IdClienteedit").val(IdCliente);
    $("#nombreedit").val(nombre);
    $("#apellido1edit").val(apellido1);
    $("#apellido2edit").val(apellido2);
    $("#direccionedit").val(direccion);
    $("#telefonoedit").val(telefono);
    $("#correoElectronicoedit").val(correoElectronico);
    $("#RFCedit").val(RFC);
    $(".modal-header").css("background-color", "#007bff");
    $(".modal-header").css("color", "white" );
    $(".modal-title").text("Editar Cliente");		
    $('#actualizar').modal('show');		   
});

//Borrar
$(document).on("click", ".btnBorrar", function(){
    fila = $(this);           
    IdCliente = parseInt($(this).closest('tr').find('td:eq(0)').text()) ;		
    opcion = 3; //eliminar        
    var respuesta = confirm("¿Está seguro de querer borrar el registro "+IdCliente+"?");                
    if (respuesta) {  
    alert("borrando");          
        $.ajax({
          url: "../model/cliente_controlador.php",
          type: "POST",
          datatype:"json",    
          data:  {opcion:opcion, IdCliente:IdCliente},    
          success: function() { alert("Se borro el Cliente");
              tablaCliente.row(fila.parents('tr')).remove().draw();                  
           }
        });	
    }
 });
 //Submit para actualizar
    $('#formedit2').submit(function(e){       
    opcion = 2;                  
    e.preventDefault(); //evita el comportambiento normal del submit, es decir, recarga total de la página
    alert("Variable opcion");
    IdCliente = $.trim($('#IdClienteedit').val());  
    alert(IdCliente);    
    nombre = $.trim($('#nombreedit').val());
    alert(nombre);  
    apellido1 = $.trim($('#apellido1edit').val());   
    alert(apellido1);   
    apellido2 = $.trim($('#apellido2edit').val()); 
    alert(apellido2);  
    direccion = $.trim($('#direccionedit').val());    
    alert(direccion);
    telefono = $.trim($('#telefonoedit').val());
    alert(telefono); 
    correoElectronico = $.trim($('#correoElectronicoedit').val());
    alert(correoElectronico); 
    RFC = $.trim($('#RFCedit').val());
    alert(RFC);                              
        $.ajax({
          url: "../model/cliente_controlador.php",
          type: "POST",
          datatype:"json",    
          data:  {opcion:opcion,IdCliente:IdCliente, nombre:nombre, apellido1:apellido1, apellido2:apellido2,direccion:direccion, telefono:telefono, correoElectronico:correoElectronico, RFC:RFC},    
          success: function(data) {
            tablaCliente.ajax.reload(null, false);
           }
        });                 
    $('#actualizar').modal('hide');                                                            
});     
});    