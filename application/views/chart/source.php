<script src="<?= base_url('assets/'); ?>code/highcharts.js"></script>
<script src="<?= base_url('assets/'); ?>code/modules/data.js"></script>
<script src="<?= base_url('assets/'); ?>code/modules/exporting.js"></script>
<script src="<?= base_url('assets/'); ?>js/bootstrap.min.js"></script>
<script src="<?= base_url('assets/'); ?>js/bootstrap-datepicker.js"></script>
<script>
    $(".input-group.date").datepicker({
        autoclose: true,
        todayHighlight: true
    });
</script>

<!-- -----------------------------GALVANIS------------------------------------- -->

<script type="text/javascript">
    Highcharts.chart('berat', {
        data: {
            table: 'tberat'
        },
        chart: {
            type: 'column'
        },
        title: {
            text: 'Hasil Produksi Galvanis (Tim: <?php echo $tim; ?>)'
        },
        yAxis: {
            allowDecimals: false,
            title: {
                text: 'Units'
            }
        },
        /*tooltip: {
            formatter: function () {
                return '<b>' + this.series.name + '</b><br/>' +
                    this.point.y + ' ' + this.point.name.toLowerCase();
            }
        }*/
    });
</script>

<script type="text/javascript">
    Highcharts.chart('container', {
        colors: ['blue', 'red', 'yellow', '#d24087'],
        data: {
            table: 'datatable_galv_baik'
        },
        chart: {
            type: 'column'
        },
        title: {
            text: 'Hasil Produksi Galvanis (Baik)'
        },
        yAxis: {
            allowDecimals: false,
            title: {
                text: 'Units'
            }
        },
        /*tooltip: {
            formatter: function () {
                return '<b>' + this.series.name + '</b><br/>' +
                    this.point.y + ' ' + this.point.name.toLowerCase();
            }
        }*/
    });
    Highcharts.chart('container_sb', {
        colors: ['blue', 'red', 'yellow', '#d24087'],
        data: {
            table: 'datatable_galv_sb'
        },
        chart: {
            type: 'column'
        },
        title: {
            text: 'Hasil Produksi Galvanis (SB)'
        },
        yAxis: {
            allowDecimals: false,
            title: {
                text: 'Units'
            }
        },
        /*tooltip: {
            formatter: function () {
                return '<b>' + this.series.name + '</b><br/>' +
                    this.point.y + ' ' + this.point.name.toLowerCase();
            }
        }*/
    });
</script>

<!-- ------------------------------------------WDPC------------------------------------------------- -->

<script type="text/javascript">
    Highcharts.chart('container', {
        colors: ['blue', 'red', 'yellow', '#483D8B', '#8B0000', '#556B2F', '#008B8B', '#7FFF00', '#8A2BE2', '#008B8B', '#7FFFD4', '#5F9EA0', '#FF7F50', '#d24087', '#DEB887', '#A9A9A9'],
        data: {
            table: 'datatable_wdpc_baik'
        },
        chart: {
            type: 'column'
        },
        title: {
            text: 'Hasil Produksi WDPC (Baik)'
        },
        yAxis: {
            allowDecimals: false,
            title: {
                text: 'Units'
            }
        },
        /*tooltip: {
            formatter: function () {
                return '<b>' + this.series.name + '</b><br/>' +
                    this.point.y + ' ' + this.point.name.toLowerCase();
            }
        }*/
    });
    Highcharts.chart('container_sb', {
        colors: ['blue', 'red', 'yellow', '#483D8B', '#8B0000', '#556B2F', '#008B8B', '#7FFF00', '#F5F5Df', '#7FFFD4', '#F5F5DC', '#5F9EA0', '#7FFF00', '#d24087'],
        data: {
            table: 'datatable_wdpc_sb'
        },
        chart: {
            type: 'column'
        },
        title: {
            text: 'Hasil Produksi WDPC (SB)'
        },
        yAxis: {
            allowDecimals: false,
            title: {
                text: 'Units'
            }
        },
        /*tooltip: {
            formatter: function () {
                return '<b>' + this.series.name + '</b><br/>' +
                    this.point.y + ' ' + this.point.name.toLowerCase();
            }
        }*/
    });
</script>


<!-- -----------------------------------------KAWAT DURI----------------------------------------------- -->


<script type="text/javascript">
    Highcharts.chart('berat', {
        data: {
            table: 'tberat'
        },
        chart: {
            type: 'column'
        },
        title: {
            text: 'Hasil Produksi Kawat Duri (Operator: <?php echo $tim; ?>)'
        },
        yAxis: {
            allowDecimals: false,
            title: {
                text: 'Units'
            }
        },
        /*tooltip: {
            formatter: function () {
                return '<b>' + this.series.name + '</b><br/>' +
                    this.point.y + ' ' + this.point.name.toLowerCase();
            }
        }*/
    });
</script>

<script type="text/javascript">
    Highcharts.chart('container', {
        colors: ['blue', 'red', 'yellow', '#483D8B', '#8B0000', '#556B2F', '#008B8B', '#7FFF00', '#7FFFD4', '#5F9EA0', '#7FFF00', '#F5F5Df', '#F5F5D6', '#F5F5D6', '#d24087'],
        data: {
            table: 'datatable_baik'
        },
        chart: {
            type: 'column'
        },
        title: {
            text: 'Hasil Produksi Kawat Duri (Baik)'
        },
        yAxis: {
            allowDecimals: false,
            title: {
                text: 'Units'
            }
        },
        /*tooltip: {
            formatter: function () {
                return '<b>' + this.series.name + '</b><br/>' +
                    this.point.y + ' ' + this.point.name.toLowerCase();
            }
        }*/
    });
    Highcharts.chart('container_sb', {
        colors: ['blue', 'red', 'yellow', '#483D8B', '#8B0000', '#556B2F', '#008B8B', '#7FFF00', '#F5F5Df', '#7FFFD4', '#F5F5DC', '#5F9EA0', '#7FFF00', '#d24087'],
        data: {
            table: 'datatable_sb'
        },
        chart: {
            type: 'column'
        },
        title: {
            text: 'Hasil Produksi Kawat Duri (SB)'
        },
        yAxis: {
            allowDecimals: false,
            title: {
                text: 'Units'
            }
        },
        /*tooltip: {
            formatter: function () {
                return '<b>' + this.series.name + '</b><br/>' +
                    this.point.y + ' ' + this.point.name.toLowerCase();
            }
        }*/
    });
</script>

<script type="text/javascript">
    Highcharts.chart('berat', {
        data: {
            table: 'tberat'
        },
        chart: {
            type: 'column'
        },
        title: {
            text: 'Hasil Produksi Kawat Duri (Operator: <?php echo $tim; ?>)'
        },
        yAxis: {
            allowDecimals: false,
            title: {
                text: 'Units'
            }
        },
        /*tooltip: {
            formatter: function () {
                return '<b>' + this.series.name + '</b><br/>' +
                    this.point.y + ' ' + this.point.name.toLowerCase();
            }
        }*/
    });
</script>