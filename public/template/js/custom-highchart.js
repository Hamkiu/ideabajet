document.addEventListener('DOMContentLoaded', function () {

    const data = window.chartData;

    Highcharts.chart('elemen1Chart', {

        chart: {
            type: 'column'
        },

        title: {
            text: 'Jumlah Cadangan Mengikut Lokasi & Pilihan'
        },

        credits: { enabled: false },

        xAxis: {
            categories: data.lokasi1,
            title: { text: 'Lokasi' }
        },

        yAxis: {
            min: 0,
            title: { text: 'Jumlah Cadangan' }
        },

        plotOptions: {
            column: {
                borderRadius: 5
            }
        },

        series: data.series1
    });

    Highcharts.chart('elemen2Chart', {

        chart: {
            type: 'bar'
        },

        title: {
            text: 'Jumlah Cadangan Mengikut Lokasi & Pilihan'
        },

        credits: { enabled: false },

        xAxis: {
            categories: data.lokasi2,
            title: { text: 'Lokasi' }
        },

        yAxis: {
            min: 0,
            title: { text: 'Jumlah Cadangan' }
        },

        plotOptions: {
            column: {
                borderRadius: 5
            }
        },

        series: data.series2
    });

    Highcharts.chart('elemen3Chart', {

        chart: {
            type: 'column'
        },

        title: {
            text: 'Jumlah Cadangan Mengikut Lokasi & Pilihan'
        },

        credits: { enabled: false },

        xAxis: {
            categories: data.lokasi3,
            title: { text: 'Lokasi' }
        },

        yAxis: {
            min: 0,
            title: { text: 'Jumlah Cadangan' }
        },

        plotOptions: {
            column: {
                borderRadius: 5
            }
        },

        series: data.series3
    });

    Highcharts.chart('elemen4Chart', {

        chart: {
            type: 'bar'
        },

        title: {
            text: 'Jumlah Cadangan Mengikut Lokasi & Pilihan'
        },

        credits: { enabled: false },

        xAxis: {
            categories: data.lokasi4,
            title: { text: 'Lokasi' }
        },

        yAxis: {
            min: 0,
            title: { text: 'Jumlah Cadangan' }
        },

        plotOptions: {
            column: {
                borderRadius: 5
            }
        },

        series: data.series4
    });

    Highcharts.chart('elemen5Chart', {

        chart: {
            type: 'pie'
        },

        title: {
            text: 'Elemen 5: Pembelian Mengikut Kategori'
        },
        subtitle: {
            text: 'Sila klik setiap pilihan untuk lihat lebih lanjut'
        },

        credits: { enabled: false },

        plotOptions: {
            pie: {
                borderRadius: 5,
                dataLabels: {
                    enabled: true,
                    format: '{point.name}: {point.y}'
                }
            }
        },

        tooltip: {
            pointFormat: '<b>{point.y}</b> cadangan'
        },

        series: [{
            name: 'Jumlah',
            colorByPoint: true,
            data: data.main
        }],

        drilldown: {
            series: data.drill
        }
    });

    Highcharts.chart('elemen6Chart', {

        chart: {
            type: 'column'
        },

        title: {
            text: 'Jumlah Cadangan Mengikut Lokasi & Pilihan'
        },

        credits: { enabled: false },

        xAxis: {
            categories: data.lokasi6,
            title: { text: 'Lokasi' }
        },

        yAxis: {
            min: 0,
            title: { text: 'Jumlah Cadangan' }
        },

        plotOptions: {
            column: {
                borderRadius: 5
            }
        },

        series: data.series6
    });

    Highcharts.chart('elemen7Chart', {

        chart: {
            type: 'bar'
        },

        title: {
            text: 'Jumlah Cadangan Mengikut Lokasi & Pilihan'
        },

        credits: { enabled: false },

        xAxis: {
            categories: data.lokasi7,
            title: { text: 'Lokasi' }
        },

        yAxis: {
            min: 0,
            title: { text: 'Jumlah Cadangan' }
        },

        plotOptions: {
            column: {
                borderRadius: 5
            }
        },

        series: data.series7
    });

    Highcharts.chart('elemen8Chart', {

        chart: {
            type: 'column'
        },

        title: {
            text: 'Jumlah Cadangan Mengikut Lokasi & Pilihan'
        },

        credits: { enabled: false },

        xAxis: {
            categories: data.lokasi8,
            title: { text: 'Lokasi' }
        },

        yAxis: {
            min: 0,
            title: { text: 'Jumlah Cadangan' }
        },

        plotOptions: {
            column: {
                borderRadius: 5
            }
        },

        series: data.series8
    });

    Highcharts.chart('pbChart', {

        chart: {
            type: 'bar'
        },

        title: {
            text: 'Pekerjaan / Bangsa'
        },

        credits: { enabled: false },

        colors: ['#1e88e5', '#5e35b1', '#43a047', '#f4511e'],

        xAxis: {
            categories: data.pekerjaanList,
            title: { text: null }
        },

        yAxis: {
            min: 0,
            title: { text: 'Jumlah' }
        },

        legend: {
            layout: 'horizontal',
            align: 'right',
            verticalAlign: 'top'
        },

        plotOptions: {
            series: {
                borderRadius: 4,
                dataLabels: {
                    enabled: true
                }
            }
        },

        series: data.seriesPb
    });


});