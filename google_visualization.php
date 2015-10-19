<html>
    <head>
        <script type="text/javascript" src="https://www.google.com/jsapi?autoload={'modules':[{'name':'visualization','version':'1.1','packages':['geochart']}]}"></script>
        <script type="text/javascript">
                  google.setOnLoadCallback(drawRegionsMap2);
                  
    function drawRegionsMap1(){
        
        var table = new google.visualization.DataTable();

        table.addColumn('string', 'COUNTRY', 'Country');
        //table.addColumn('string', 'DESCRIPTION', 'Description');
        table.addColumn('string', 'POPULATION', 'Population');
        table.addColumn('string', 'VALUE', 'Music Consumers');
        table.addColumn({type:'string', role:'tooltip'});

        var rows = [
            ['Germany', 'something desc', "Albany-Schenectady-Troy NY", '100'],
            ['United States',  'something desc', "Charlotte NC", '200'],
            ['Brazil',  'something desc', "Charlotte NC", '300'],
            ['Canada',  'something desc', "Charlotte NC", '406'],
            
        ];

        var options = {

        };
        table.addRows(rows);
        var geochart = new google.visualization.GeoChart(document.getElementById('regions_div'));
        geochart.draw(table,options);


    }

    function drawRegionsMap() {

        var data = google.visualization.arrayToDataTable([
          ['Country', 'PopularityStates','States'],
          ['Germany', 300,15],
          ['United States', 300,45],
          ['Brazil', 400,10],
          ['Canada', 500,30],
          ['France', 600,25],
          ['PK', 900,5],  
          ['RU', 700,20]
        ]);


         var options = {
             colorAxis: {colors: ['yellow','red']},
        };

        var chart = new google.visualization.GeoChart(document.getElementById('regions_div'));

        chart.draw(data, options);
    }
    
    function drawRegionsMap2() {
		
        var data = google.visualization.arrayToDataTable([
          ['Country', 'Population','anything'],
         //  ['PK', 900,5],  
          // ['IN', 5000,50],  
           ['SG', 0,0],  
          //['Asia', 89898,300]
          
        ]);


         var options = {
             colorAxis: {colors: ['green','green']},
            // region: '035',
        };

        var chart = new google.visualization.GeoChart(document.getElementById('regions_div'));

        chart.draw(data, options);
    }

        </script>
    </head>
    <body>
        <div id="regions_div" style="width: 900px; height: 500px;"></div>
    </body>
</html>

       