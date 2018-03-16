$(document).on('ready',function(){

    $('#reporte_1').DataTable({   
        dom: 'Bfrtip',
        responsive: false,
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ],
        
        'destroy':true,
        'paging':true,
        'info':true,
        'filter':true,
        'stateSave':true,
        'ajax':{
            "url":base_url+"Reportes_1/reporte",
            "type":"POST",
            dataSrc: ''
        },
        'columns':[
            {data: 'cod_producto'},
            {data: 'producto'},
            {data: 'suma'},
        ],
        "order":[[1, "asc"]],
        'language':español
    });
    
    $('#reporte_2').DataTable({   
        dom: 'Bfrtip',
        responsive: false,
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ],
        
        'destroy':true,
        'paging':true,
        'info':true,
        'filter':true,
        'stateSave':true,
        'ajax':{
            "url":base_url+"reportes_2/reporte",
            "type":"POST",
            dataSrc: ''
        },
        'columns':[
            {data: 'cod_producto'},
            {data: 'producto'},
            {data: 'suma'},
        ],
        "order":[[1, "asc"]],
        'language':español
    });
    
    $('#reporte_3').DataTable({   
        dom: 'Bfrtip',
        responsive: false,
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ],
        
        'destroy':true,
        'paging':true,
        'info':true,
        'filter':true,
        'stateSave':true,
        'ajax':{
            "url":base_url+"reportes_3/reporte",
            "type":"POST",
            dataSrc: ''
        },
        'columns':[
            {data: 'cod_servicio'},
            {data: 'servicio'},
            {data: 'count'},
        ],
        "order":[[1, "asc"]],
        'language':español
    });
});
