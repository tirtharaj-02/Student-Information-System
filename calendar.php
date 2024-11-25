<!DOCTYPE html>
<html>
<head><title>Calendar</title>
	<style>
		body {
			background-color: #f8f8f8;
			font-family: Arial, sans-serif;
		}
		
		.calendar {
			border-collapse: collapse;
			margin: 50px auto;
			box-shadow: 0px 0px 5px rgba(0,0,0,0.1);
			background-color: #fff;
			color: #333;
			border-radius: 5px;
			overflow: hidden;
		}
		
		.calendar th,
		.calendar td {
			padding: 10px;
			text-align: center;
			font-size: 16px;
		}
		
		.calendar th {
			background-color: #17a2b8;
			font-weight: bold;
			color: #fff;
			border: 1px solid #17a2b8;
			text-transform: uppercase;
		}
		
		.calendar td {
			border: 1px solid #ccc;
			background-color: #fff;
			transition: all 0.2s ease;
			cursor: pointer;
		}
		
		.calendar td:hover {
			background-color: #f8f8f8;
		}
		
		.calendar td.today {
			background-color: #f9c3c3;
		}
		
		.button {
			background-color: #007bff;
			color: #fff;
			border: none;
			padding: 10px 20px;
			border-radius: 5px;
			cursor: pointer;
			transition: all 0.2s ease;
		}
		
		.button:hover {
			background-color: green;
		}
		
	</style>
	

</head>
<body>
<table class="calendar">
  <thead>
    <tr>
      <th colspan="7">
        <span id="year"></span> 
        <span id="month"></span>
		
      </th>
    </tr>
    <tr>
      <th>Sun</th>
      <th>Mon</th>
      <th>Tue</th>
      <th>Wed</th>
      <th>Thu</th>
      <th>Fri</th>
      <th>Sat</th>
    </tr>
  </thead>
  <tbody>
  </tbody>
</table>

<script>
  var d = new Date();
  var year = d.getFullYear();
  var month = d.toLocaleString('default', { month: 'long' });
  var daysInMonth = new Date(year, d.getMonth() + 1, 0).getDate();
  var firstDay = new Date(year, d.getMonth(), 1).getDay();

  document.getElementById('year').innerHTML = year;
  document.getElementById('month').innerHTML = month;

  var tbody = document.getElementsByTagName('tbody')[0];
  var row = document.createElement('tr');
  var day = 1;

  for (var i = 0; i < 7; i++) {
    if (i < firstDay) {
      row.innerHTML += '<td></td>';
    } else {
      row.innerHTML += '<td>' + day + '</td>';
      day++;
    }
  }

  tbody.appendChild(row);

  for (var i = 0; i < 5; i++) {
    var row = document.createElement('tr');
    for (var j = 0; j < 7; j++) {
      if (day > daysInMonth) {
        break;
      } else {
        var today = d.getDate() == day && d.getMonth() == new Date().getMonth() && d.getFullYear() == year ? 'today' : '';
        row.innerHTML += '<td class="' + today + '">' + day + '</td>';
        day++;
      }
    }
    tbody.appendChild(row);
  }
</script>

	<input type=button class = "button "onClick="location.href='index.php'"value='Exit'>
</body>
</html>
