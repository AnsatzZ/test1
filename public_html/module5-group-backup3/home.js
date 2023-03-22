let selectedDay = ''
let selectedYear = ''
let selectedMonth = ''

var today = new Date();
var year = today.getFullYear();
var month = today.getMonth();

var dialogOverlay = document.getElementById('dialog-overlay');
var dialogBox = document.getElementById('dialog-box');
var dialogClose = document.getElementById('dialog-close');
var username = document.getElementById("username").value; 
var dialogFooterList=document.getElementById('dialogFooterList');

if ("logged_in"==true){
	// function colorChange(username){
		var data={
			"user":username
		}
	
		fetch("lesseeRed.php", {
			method: 'POST',
			body: JSON.stringify(data),
			headers: { 'content-type': 'application/json' }
		})
		.then(response =>response.json())
		.then(data => {
			list=data
			displayCalendar(year,month)
		})
		// .catch(err => alert(err));
	}


function showDialog(time) {
	dialogOverlay.style.display = 'block';
	dialogBox.style.display = 'block';
	var username = document.getElementById("username").value; 
	function detail(data) {
		console.log(data)
		// Make a URL-encoded string for passing POST data: findDetail.php
		fetch("findDetail.php", {
				method: 'POST',
				body: JSON.stringify(data),
				headers: { 'content-type': 'application/json' }
			})
			.then(response =>response.json())
			.then(data => {
				var dialogFooterList=document.getElementById('dialogFooterList');
				for(var j=0;j<data.length;j++){
					let p = document.createElement('p');
					console.log(p + "<");
					p.innerHTML="日期："+data[j].date+'&nbsp时间：'+data[j].time+'&nbsp标题'+data[j].activity+'&nbsp描述：'+data[j].description
					dialogFooterList.appendChild(p);
				}
			})
			.catch(err => alert(err));
	}
	var data={
		'user':username,
		'date':time
	}
	detail(data)
	// var dialogFooterList=document.getElementById('dialogFooterList');
	// for(var j=0;j<obj.length;j++){
	// let p = document.createElement('p');
	// p.innerHTML=obj[j].date+'&nbsp'+obj[j].activity+'&nbsp'+obj[j].description
	// dialogFooterList.appendChild(p);
	// }
}

function hideDialog() {
	dialogOverlay.style.display = 'none';
	dialogBox.style.display = 'none';
}
hideDialog()

dialogClose.addEventListener('click', hideDialog);
dialogOverlay.addEventListener('click', hideDialog);
var list = ['2023-3-3', '2023-3-20', '2023-3-18']
function colorChange(username){
	var data={
		"user":username
	}

	fetch("lesseeRed.php", {
		method: 'POST',
		body: JSON.stringify(data),
		headers: { 'content-type': 'application/json' }
	})
	.then(response =>response.json())
	.then(data => {
		list=data
		displayCalendar(year,month)
	})
	.catch(err => alert(err));
}



function displayCalendar(year, month) {
	var firstDayOfMonth = new Date(year, month, 1);
	var lastDayOfMonth = new Date(year, month + 1, 0);
	var lastDayOfPrevMonth = new Date(year, month, 0);
	var daysInMonth = lastDayOfMonth.getDate();
	var daysInPrevMonth = lastDayOfPrevMonth.getDate();
	var startDay = firstDayOfMonth.getDay();
	var endDay = lastDayOfMonth.getDay();
	var prevMonthDays = startDay === 0 ? 6 : startDay - 1;
	var nextMonthDays = endDay === 0 ? 0 : 7 - endDay;

	var calendarBody = document.getElementById('calendarBody');
	calendarBody.innerHTML = '';

	var date = 1;
	for (var i = 0; i < 6; i++) {
		var row = document.createElement('tr');
		for (var j = 0; j < 7; j++) {
			if (i === 0 && j < prevMonthDays) {
				var prevMonthDate = daysInPrevMonth - prevMonthDays + j + 1;
				var cell = document.createElement('td');
				cell.classList.add('prev-month');
				cell.innerHTML = prevMonthDate;
				row.appendChild(cell);
			} else if (date > daysInMonth) {
				let nextMonthDate = date - daysInMonth;
				let cell = document.createElement('td');
				cell.classList.add('next-month');
				cell.innerHTML = nextMonthDate;
				row.appendChild(cell);
				date++;
			} else {
				let nowDataTask = false
				let cell = document.createElement('td');
				let dateNow = new Date();
				cell.innerHTML = date;
				cell.onclick = (function(param) {
					let childrenparam = param;
					return function() {
						console.log(childrenparam, year, month + 1);
						selectedDay = childrenparam
						selectedMonth = month + 1
						selectedYear = year
						var selectedTime=year + '-' + (month + 1) + '-' + childrenparam + '';
						let showTime = document.getElementById('showTime');
						showTime.innerHTML = year + '-' + (month + 1) + '-' + childrenparam + '';
						showDialog(selectedTime)
					}
				})(date);
				if (year == dateNow.getFullYear() && month == dateNow.getMonth() && date == dateNow.getDate()) {
					for (let j = 0; j < list.length; j++) {
						let valDate = list[j].split('-')
						if (parseInt(valDate[0]) == parseInt(year) && parseInt(valDate[1]) == parseInt((month +
								1)) && parseInt(
								valDate[2]) == parseInt(date)) {
							nowDataTask = true
							break
						}
					}
					if (nowDataTask) {
						cell.className = 'bg-style size-red'
					} else {
						cell.className = 'bg-style'
					}

				} else {
					for (let j = 0; j < list.length; j++) {
						let valDate = list[j].split('-')
						if (parseInt(valDate[0]) == parseInt(year) && parseInt(valDate[1]) == parseInt((month +
								1)) && parseInt(
								valDate[2]) == parseInt(date)) {
							nowDataTask = true
							break
						}
					}
					if (nowDataTask) {
						cell.className = 'size-red'
					}
				}
				row.appendChild(cell);
				date++;
			}
		}
		calendarBody.appendChild(row);
	}

	var currentMonth = document.getElementById('currentMonth');
	currentMonth.innerHTML = year + '-' + (month + 1) + '';
}

// displayCalendar(year, month);

document.getElementById('prevMonth').addEventListener('click', function() {
	if (month === 0) {
		year--;
		month = 11;
	} else {
		month--;
	}
	displayCalendar(year, month);
});

document.getElementById('nextMonth').addEventListener('click', function() {
	if (month === 11) {
		year++;
		month = 0;
	} else {
		month++;
	}
	displayCalendar(year, month);
});

// 添加事件
document.getElementById('add-event').addEventListener('click', function() {
	
	let title = document.querySelector('#Title').value;
	let descriptions = document.querySelector('#Descriptions').value;
	let time = document.querySelector('#Time').value;
	let username = document.getElementById("username").value; 
	// let time = document.querySelector('#Time').value;
	// eventid
	if (title == '' || descriptions == ''||time == "") {
		alert('Please fill in all fields');
	} else {
		//zhandao
		let username = document.getElementById("username").value; 
 //添加日常的参数
 		let  data = { 'user' : username,'time': time, 'title': title, 'descriptions': descriptions,"date":selectedYear + '-' + selectedMonth + '-' + selectedDay};
		console.log(data)
		function addeventsAjax(data) {
			console.log(data)
			// Make a URL-encoded string for passing POST data:
			fetch("add_ajax.php", {
					method: 'POST',
					body: JSON.stringify(data),
					headers: { 'content-type': 'application/json' }
				})
				.then(response => response.json())
				.then(data => alert(data.success ? "Add Successfully!" : `Check your inputs! ${data.message}`))
				.catch(err => alert(err));
		}


		// alert(selectedYear + '-' + selectedMonth + '-' + selectedDay + '-' + title + '-' + descriptions)
		// list.push(selectedYear + '-' + selectedMonth + '-' + selectedDay)
		addeventsAjax(data)
		console.log(list)
		// 重新添加一个月所有天数
		displayCalendar(year, month);
		hideDialog()
	}
});

// 删除事件
document.getElementById('delete-event').addEventListener('click', function() {
	let title = document.querySelector('#Title').value;
	let descriptions = document.querySelector('#Descriptions').value;
	alert(selectedYear + '-' + selectedMonth + '-' + selectedDay)
});

// 更新事件
document.getElementById('change-event').addEventListener('click', function() {
	let title = document.querySelector('#Title').value;
	let descriptions = document.querySelector('#Descriptions').value;

});