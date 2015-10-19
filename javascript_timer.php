<html>
	<body>
	<p>
		Some text here
	</p>
	</body>
</html>
<script type="text/javascript">
		var minutesLabel = document.createElement("label");
		minutesLabel.id = "minutes";        

		var secondsLabel = document.createElement("label");
        secondsLabel.id = "seconds";

		var body = document.getElementsByTagName("BODY")[0];
		
		body.appendChild(minutesLabel);
		body.appendChild(secondsLabel);
		
		var totalSeconds = 0;
        setInterval(setTime, 1000);

        function setTime()
        {
            ++totalSeconds;
            secondsLabel.innerHTML = pad(totalSeconds%60);
            minutesLabel.innerHTML = pad(parseInt(totalSeconds/60))+" : ";
        }

        function pad(val)
        {
            var valString = val + "";
            if(valString.length < 2)
            {
                return "0" + valString;
            }
            else
            {
                return valString;
            }
        }
    </script>