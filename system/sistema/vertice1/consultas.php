<?php
    $dmn = $_POST['dmn'];
    $tipo = $_POST['tipo'];
    $desde = $_POST['desde'];
    $hasta = $_POST['hasta'];
    if ($tipo =='Plan de Siembra'){
        $vertp_tipo = "SIEMBRA";
    }
    if ($tipo =='Plan de Cosecha'){
        $vertp_tipo = "COSECHA";
    }
    $grafico = paraTodos::arrayConsulta("rut_descripcion, sum(vertp_hasemb) as vertp_hasemb, sum(vertp_hsem) as vertp_hsem ", "vertice_gen vg, vertice_produccion vp, rubro_tipo rt, rubros r
left join rubro_clase rc on rc.ruc_rucodigo=r.ru_codigo", "vg.verg_codigo=vp.vertp_vergcodigo and vp.vertp_rubro=r.ru_codigo and vp.vertp_tiprubro=rt.rut_codigo
and ru_clasificacion='VEGETAL' and vertp_tipo='$vertp_tipo' and verg_desde>='$_POST[desde]' and verg_hasta<='$_POST[hasta]' group by rut_descripcion");
$grafico2 = paraTodos::arrayConsulta("rut_descripcion, sum(vertp_hsem) as vertp_hsem ", "vertice_gen vg, vertice_produccion vp, rubro_tipo rt, rubros r
left join rubro_clase rc on rc.ruc_rucodigo=r.ru_codigo", "vg.verg_codigo=vp.vertp_vergcodigo and vp.vertp_rubro=r.ru_codigo and vp.vertp_tiprubro=rt.rut_codigo
and ru_clasificacion='VEGETAL' and vertp_tipo='$vertp_tipo' and verg_desde>='$_POST[desde]' and verg_hasta<='$_POST[hasta]' group by rut_descripcion");
?>
<link rel="stylesheet" type="text/css" href="<?php echo $ruta_base;?>assets-minified/widgets/datatable/datatable.css">
    <div class="panel panel-default">
        <div class="panel-body" id="panelgen">
                <div class="content-box">
                    <h3 class="content-box-header bg-default">Consultas y Reportes</h3>
                    <form id="frmbuscar" class="form-horizontal" onsubmit="$.ajax({
                                type: 'POST',
                                url: 'accion.php',
                                data: {
									desde: $('#desde').val(),                                               
									hasta: $('#hasta').val(),                                               
									tipo: $('#tipoconsul').val(),
									ver: 2,
                                    dmn   : <?php echo $dmn; ?>
                                },
                                success: function(html) {
                                    $('#verContenido').html(html);
                                },
                                error: function(xhr,msg,excep) {
                                	alert('Error Status ' + xhr.status + ': ' + msg + '/ ' + excep);
                                }
							}); return false"  action="javascript: void(0);" method="post">
                        <select id="tipoconsul" class="form-control col-xs-12">
                            <option>Seleccione Tipo de Consulta</option>
                            <option>Plan de Siembra</option>
                            <option>Plan de Cosecha</option>
                            <option>Otras Actividades</option>
                        </select>
                        <div class="col-sm-4">
                            <label>Desde</label>
                            <input type="date" id="desde" class="form-control" placeholder="dd/mm/aaaa" value="<?php echo $desde;?>" required>
                        </div>
                        <div class="col-sm-4">
                            <label>Hasta</label>
                            <input type="date" id="hasta" class="form-control" placeholder="dd/mm/aaaa" value="<?php echo $hasta;?>" required>
                        </div>
                        <div class="col-sm-4">
                            <br>
                            <button type="submit" class="btn btn-default" id="btnbuscar">Buscar</button>
                        </div>
                    </form>                        
                </div>
            <br>
            <br>
                <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered dataTable no-footer" id="tbconsul" role="grid" aria-describedby="dynamic-table-example-1_info">
                    <thead>
                        <tr role="row">
                            <?php 
                            if ($_POST['tipo']=="Plan de Siembra" or $_POST['tipo']=="Plan de Cosecha") {
                            ?>
<th class="sorting_asc" tabindex="0" aria-controls="dynamic-table-example-1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column ascending" style="width: 176px;">Código<i class="glyph-icon"></i></th>                            
<th class="sorting_asc" tabindex="0" aria-controls="dynamic-table-example-1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column ascending" style="width: 176px;">Desde<i class="glyph-icon"></i></th>                            
<th class="sorting_asc" tabindex="0" aria-controls="dynamic-table-example-1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column ascending" style="width: 176px;">Hasta<i class="glyph-icon"></i></th>                            
<th class="sorting_asc" tabindex="0" aria-controls="dynamic-table-example-1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column ascending" style="width: 176px;">Rubro<i class="glyph-icon"></i></th>                            
<th class="sorting_asc" tabindex="0" aria-controls="dynamic-table-example-1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column ascending" style="width: 176px;">Tipo de rubro<i class="glyph-icon"></i></th>                            
<th class="sorting_asc" tabindex="0" aria-controls="dynamic-table-example-1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column ascending" style="width: 176px;">Clase de rubro<i class="glyph-icon"></i></th>                            
<th class="sorting_asc" tabindex="0" aria-controls="dynamic-table-example-1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column ascending" style="width: 176px;">Has. a Sembrar<i class="glyph-icon"></i></th>                            
<th class="sorting_asc" tabindex="0" aria-controls="dynamic-table-example-1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column ascending" style="width: 176px;">Has. Sembradas<i class="glyph-icon"></i></th>
<th class="sorting_asc" tabindex="0" aria-controls="dynamic-table-example-1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column ascending" style="width: 176px;">Editar<i class="glyph-icon"></i></th>
                            <?php
                            }
                            if ($_POST['tipo']=="Otras Actividades") {
                            ?>
<th class="sorting_asc" tabindex="0" aria-controls="dynamic-table-example-1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column ascending" style="width: 176px;">Código<i class="glyph-icon"></i></th>                            
<th class="sorting_asc" tabindex="0" aria-controls="dynamic-table-example-1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column ascending" style="width: 176px;">Desde<i class="glyph-icon"></i></th>                            
<th class="sorting_asc" tabindex="0" aria-controls="dynamic-table-example-1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column ascending" style="width: 176px;">Hasta<i class="glyph-icon"></i></th>                            
<th class="sorting_asc" tabindex="0" aria-controls="dynamic-table-example-1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column ascending" style="width: 176px;">Descripción<i class="glyph-icon"></i></th>                            
<th class="sorting_asc" tabindex="0" aria-controls="dynamic-table-example-1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column ascending" style="width: 176px;">Resultados<i class="glyph-icon"></i></th>                            
<th class="sorting_asc" tabindex="0" aria-controls="dynamic-table-example-1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column ascending" style="width: 176px;">Explicación<i class="glyph-icon"></i></th>                            
<th class="sorting_asc" tabindex="0" aria-controls="dynamic-table-example-1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column ascending" style="width: 176px;">Reflexión<i class="glyph-icon"></i></th>                            
<th class="sorting_asc" tabindex="0" aria-controls="dynamic-table-example-1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column ascending" style="width: 176px;">Acción<i class="glyph-icon"></i></th>                            
<th class="sorting_asc" tabindex="0" aria-controls="dynamic-table-example-1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column ascending" style="width: 176px;">Editar<i class="glyph-icon"></i></th>
                            <?php
                            }
                            ?>
                        </tr>
                    </thead>
                    <tbody>
                            <?php
                            if ($_POST['tipo']=="Plan de Siembra") {
                                $consulta = paraTodos::arrayConsulta("*", "vertice_gen vg, vertice_descripcion vd, vertice_analisis va", "vg.verg_codigo=vd.vertdes_vergcodigo and va.verta_verpcodigo=vd.vertdes_codigo and verg_desde>='$_POST[desde]' and verg_hasta<='$_POST[hasta]'");
                                foreach($consulta as $rowconsul){
                            ?>
                        <tr class="gradeA even" role="row">                        
                            <td><?php echo $rowconsul['verg_codigo']?></td>
                            <td><?php echo $rowconsul['verg_desde']?></td>
                            <td><?php echo $rowconsul['verg_hasta']?></td>
                            <td><?php echo $rowconsul['vertdes_descrip']?></td>
                            <td><?php echo $rowconsul['rut_descripcion']?></td>
                            <td><?php echo $rowconsul['ruc_descripcion']?></td>
                            <td><?php echo $rowconsul['vertp_hasemb']?></td>
                            <td><?php echo $rowconsul['vertp_hsem']?></td>
                            <td><a onclick="$.ajax({
                                type: 'POST',
                                url: 'accion.php',
                                data: {
									mostrar: <?php echo $rowconsul['verg_codigo']?>,
									ver: 2,
                                    dmn   : 116,
                                },
                                success: function(html) {
                                    $('#verContenido').html(html);
                                    $('#tab-entes').css('display', '');
                                    $('#tab-rub').css('display', '');
                                    $('#tab-datgen').css('display', '');
                                    $('#tab-analisis').css('display', '');
                                },
                                error: function(xhr,msg,excep) {
                                	alert('Error Status ' + xhr.status + ': ' + msg + '/ ' + excep);
                                }
							}); return false" href="">Editar</a>
                            </td>
                        </tr>                            
                            <?php                                    
                                }
                            }
                            if ($_POST['tipo']=="Plan de Cosecha") {                            
                                $consulta = paraTodos::arrayConsulta("*", "vertice_gen vg, vertice_produccion vp, rubro_tipo rt, rubros r
left join rubro_clase rc on rc.ruc_rucodigo=r.ru_codigo", "vg.verg_codigo=vp.vertp_vergcodigo and vp.vertp_rubro=r.ru_codigo and vp.vertp_tiprubro=rt.rut_codigo
and ru_clasificacion='VEGETAL' and vertp_tipo='COSECHA' and verg_desde>='$_POST[desde]' and verg_hasta<='$_POST[hasta]'");
                                foreach($consulta as $rowconsul){
                            ?>
                        <tr class="gradeA even" role="row">                        
                            <td><?php echo $rowconsul['verg_codigo']?></td>
                            <td><?php echo $rowconsul['verg_desde']?></td>
                            <td><?php echo $rowconsul['verg_hasta']?></td>
                            <td><?php echo $rowconsul['ru_descripcion']?></td>
                            <td><?php echo $rowconsul['rut_descripcion']?></td>
                            <td><?php echo $rowconsul['ruc_descripcion']?></td>
                            <td><?php echo $rowconsul['vertp_hasemb']?></td>
                            <td><?php echo $rowconsul['vertp_hsem']?></td>
                            <td><a onclick="$.ajax({
                                type: 'POST',
                                url: 'accion.php',
                                data: {
									mostrar: <?php echo $rowconsul['verg_codigo']?>,
									ver: 2,
                                    dmn   : 117,
                                },
                                success: function(html) {
                                    $('#verContenido').html(html);
                                    $('#tab-entes').css('display', '');
                                    $('#tab-rub').css('display', '');
                                    $('#tab-datgen').css('display', '');
                                    $('#tab-analisis').css('display', '');
                                },
                                error: function(xhr,msg,excep) {
                                	alert('Error Status ' + xhr.status + ': ' + msg + '/ ' + excep);
                                }
                                }); return false" href="">Editar</a>
                            </td>
                        </tr>                            
                            <?php                                    
                                }
                            }
                            ?>
                        <?php                                    
                            if ($_POST['tipo']=="Otras Actividades") {                            
                                $consulta = paraTodos::arrayConsulta("*", "vertice_gen vg, vertice_produccion vp, rubro_tipo rt, rubros r
left join rubro_clase rc on rc.ruc_rucodigo=r.ru_codigo", "vg.verg_codigo=vp.vertp_vergcodigo and vp.vertp_rubro=r.ru_codigo and vp.vertp_tiprubro=rt.rut_codigo
and ru_clasificacion='VEGETAL' and vertp_tipo='COSECHA' and verg_desde>='$_POST[desde]' and verg_hasta<='$_POST[hasta]'");
                                foreach($consulta as $rowconsul){
                            ?>
                        <tr class="gradeA even" role="row">                        
                            <td><?php echo $rowconsul['verg_codigo']?></td>
                            <td><?php echo $rowconsul['verg_desde']?></td>
                            <td><?php echo $rowconsul['verg_hasta']?></td>
                            <td><?php echo $rowconsul['ru_descripcion']?></td>
                            <td><?php echo $rowconsul['rut_descripcion']?></td>
                            <td><?php echo $rowconsul['ruc_descripcion']?></td>
                            <td><?php echo $rowconsul['vertp_hasemb']?></td>
                            <td><?php echo $rowconsul['vertp_hsem']?></td>
                            <td><a onclick="$.ajax({
                                type: 'POST',
                                url: 'accion.php',
                                data: {
									mostrar: <?php echo $rowconsul['verg_codigo']?>,
									ver: 2,
                                    dmn   : 117,
                                },
                                success: function(html) {
                                    $('#verContenido').html(html);
                                    $('#tab-entes').css('display', '');
                                    $('#tab-rub').css('display', '');
                                    $('#tab-datgen').css('display', '');
                                    $('#tab-analisis').css('display', '');
                                },
                                error: function(xhr,msg,excep) {
                                	alert('Error Status ' + xhr.status + ': ' + msg + '/ ' + excep);
                                }
                                }); return false" href="">Editar</a>
                            </td>
                        </tr>                            
                            <?php                                    
                                }
                            }
                            ?>
                    </tbody>
                </table>
            <div id="grafproduc" class="col-sm-6"></div>
            <div id="grafproducr" class="col-sm-6"></div>
        </div>
    </div>        
    <script type="text/javascript" src="<?php echo $ruta_base;?>assets-minified/widgets/datatable/datatable.js"></script>
    <script type="text/javascript" src="<?php echo $ruta_base;?>assets-minified/widgets/datatable/datatable-bootstrap.js"></script>
    <script type="text/javascript">
        /* Datatables init */
            $('#tbconsul').dataTable({
                "language": {
                    "url": "<?php echo $ruta_base;?>assets-minified/widgets/datatable/Spanish.json"
                }                
            });
    </script>
    <script type="text/javascript">
        google.charts.load('current', {'packages':['bar'], 'callback': drawCharts});
        google.charts.setOnLoadCallback(drawChart);
        google.charts.setOnLoadCallback(drawColColors); 
        function drawCharts() {
            drawChart();
            drawChart1();
        }           
        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['Rubro', 'Estimado en Has.', 'Resultado en Has.'],                
                <?php
                    foreach($grafico as $row){
                ?>
                        ['<?php echo $row[rut_descripcion]?>', <?php echo $row[vertp_hasemb]?>, <?php echo $row[vertp_hsem]?>],                        
                <?php
                    }
                ?>
            ]);
            var options = {
            chart: {
                title: 'Comparación de Resultados',
                subtitle: '',
            },
            vAxis: {format: 'decimal'},
            height: 400,                
            };
            var chart = new google.charts.Bar(document.getElementById('grafproduc'));
            chart.draw(data, options);
        }
        function drawChart1() {
            var data = google.visualization.arrayToDataTable([
                ['Rubro', 'Produccion por Has.'],                
                <?php
                    foreach($grafico2 as $row){
                ?>
                        ['<?php echo $row[rut_descripcion]?>', <?php echo $row[vertp_hsem]?>],                        
                <?php
                    }
                ?>
            ]);
            var options = {
            chart: {
                title: 'Producción por Tipo de Rubro',
                subtitle: '',
            },
            vAxis: {format: 'decimal'},
            height: 400,                
            };
            var chart = new google.charts.Bar(document.getElementById('grafproducr'));
            chart.draw(data, options);
        }  
    </script>