$(document).ready(function() {
alert("Ingreso a productos");
var codigo, opcion;
opcion = 4;//listar
    
tablaProducto = $('#tablaProducto').DataTable({  
    "ajax":{            
        "url": "../model/producto_controlador.php", 
        "method": 'POST', //usamos el metodo POST
        "data":{opcion:opcion}, //enviamos opcion 4 para que haga un SELECT
        "dataSrc":""
    },
    "columns":[
        {"data": "codigo"},
        {"data": "descripcion"},
        {"data": "precio"},
        {"data": "marca"},
        {"data": "tipo"},
        {"defaultContent": "<div class='text-center'><div class='btn-group'><button class='btn btn-primary btn-sm btnEditar'><i class='material-icons'>edit</i></button><button class='btn btn-danger btn-sm btnBorrar'><i class='material-icons'>delete</i></button></div></div>"}
    ]
});     

var fila; //captura la fila, para editar o eliminar
//submit para el Alta y Actualización
$('#formadd').submit(function(e){      
alert("Enviando..");                    
    e.preventDefault(); //evita el comportambiento normal del submit, es decir, recarga total de la página
    codigo = $.trim($('#codigo').val());    
    descripcion = $.trim($('#descripcion').val());
    precio = $.trim($('#precio').val());    
    marca = $.trim($('#marca').val());    
    tipo = $.trim($('#tipo').val());                           
        $.ajax({
          url: "../model/producto_controlador.php",
          type: "POST",
          datatype:"json",    
          data: {opcion:opcion,codigo:codigo, descripcion:descripcion, precio:precio, marca:marca, tipo:tipo},   
          success: function(data) {
            //tablaproducto.ajax.reload(null, false);
            alert("Agregado");
           }
        });			        
    $('#agregar').modal('hide');											     			
});

//AJAX CON METODO GET
/* $.ajax({
          url: "../model/producto_controlador.php?codigo="+codigo+"&descripcion"+descripcion+"&precio"+precio+"&marca"+marca+"&tipo"+tipo,
          type: "GET",
          //datatype:"json",    
          //data: ,  //{codigo:codigo, descripcion:descripcion, precio:precio, marca:marca, tipo:tipo},   
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
    codigo=-1;
    $("#formadd").trigger("reset");
    $(".modal-header").css( "background-color", "#17a2b8");
    $(".modal-header").css( "color", "white" );
    $(".modal-title").text("Formulario de registro de producto");
    $('#agregar').modal('show');	    
});


//Editar        
$(document).on("click", ".btnEditar", function(){		        
    opcion = 2;//editar
    fila = $(this).closest("tr");	        
    codigo= parseInt(fila.find('td:eq(0)').text()); //capturo el ID		
    alert(codigo);          
    descripcion = fila.find('td:eq(1)').text();
    alert(descripcion);  
    precio = fila.find('td:eq(2)').text();
    alert(precio);  
    marca = fila.find('td:eq(3)').text();
    alert(marca);  
    tipo = fila.find('td:eq(4)').text();
    alert(tipo);  
    $("#codigoedit").val(codigo);
    $("#descripcionedit").val(descripcion);
    $("#precioedit").val(precio);
    $("#marcaedit").val(marca);
    $("#tipoedit").val(tipo);
    $(".modal-header").css("background-color", "#007bff");
    $(".modal-header").css("color", "white" );
    $(".modal-title").text("Editar producto");		
    $('#actualizar').modal('show');		   
});

//Borrar
$(document).on("click", ".btnBorrar", function(){
    fila = $(this);           
    codigo = parseInt($(this).closest('tr').find('td:eq(0)').text()) ;		
    opcion = 3; //eliminar        
    var respuesta = confirm("¿Está seguro de querer borrar el registro "+codigo+"?");                
    if (respuesta) {  
    alert("borrando");          
        $.ajax({
          url: "../model/producto_controlador.php",
          type: "POST",
          datatype:"json",    
          data:  {opcion:opcion, codigo:codigo},    
          success: function() { alert("Se borro");
              tablaProducto.row(fila.parents('tr')).remove().draw();                  
           }
        });	
    }
 });
 //Submit para actualizar
    $('#formedit').submit(function(e){       
    opcion = 2;                  
    e.preventDefault(); //evita el comportambiento normal del submit, es decir, recarga total de la página
    alert("Variable opcion");
    codigo = $.trim($('#codigoedit').val());  
    alert(codigo);    
    descripcion = $.trim($('#descripcionedit').val());
    alert(descripcion);  
    precio = $.trim($('#precioedit').val());   
    alert(precio);   
    marca = $.trim($('#marcaedit').val()); 
    alert(marca);  
    tipo = $.trim($('#tipoedit').val());    
    alert(tipo);                             
        $.ajax({
          url: "../model/producto_controlador.php",
          type: "POST",
          datatype:"json",    
          data:  {opcion:opcion,codigo:codigo, descripcion:descripcion, precio:precio, marca:marca,tipo:tipo},    
          success: function(data) {
            tablaProducto.ajax.reload(null, false);
           }
        });                 
    $('#actualizar').modal('hide');                                                            
});     
});    