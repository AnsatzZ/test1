// 获取年月日和星期几
let date = new Date();
Y = date.getFullYear();
M = date.getMonth();
W = date.getDay();
D = date.getDate();
isSelect = true; //true为选择了月，false为选择了年（添加文本阴影）

let list = ['2023-3-3', '2023-3-20', '2023-3-18']

let taskAddFun = document.getElementById('taskAdd')
taskAddFun.onclick = function() {
	let dateVal = document.getElementById("date").value
	if (dateVal) {
		list.push(dateVal)
		console.log(list)
		// 清空一个月所有天数
		days.innerHTML = "";
		// 重新添加一个月所有天数
		updateAllDays(Y, M);
		alert('添加成功')
	} else {
		alert('添加失败，请选择日期')
	}
}

// 更新当前年
let yearNow = document.getElementById("year");
yearNow.innerHTML = Y;
// 更新当前月
let monthNow = document.getElementById("month");
monthNow.innerHTML = monthAndMaxDay(Y, M)[0];
// 判断选中年还是月（添加文本阴影）
selected(isSelect);
//更新当前日
let days = document.getElementById("day");
updateAllDays(Y, M);

// 选择按月切换还是按年切换
yearNow.addEventListener("click", function() {
	isSelect = false
	selected(isSelect);
});
monthNow.addEventListener("click", function() {
	isSelect = true;
	selected(isSelect);
});

// 左右切换日期
let previous = document.getElementById("pre-month");
previous.addEventListener("click", function() {
	changePage(true);
});
let next = document.getElementById("next-month");
next.addEventListener("click", function() {
	changePage(false);
});

// 按日查询对应的星期几
function dayToStar(year, month, day) {
	let theDate = new Date(year, month, day);
	return theDate.getDay();
}

// 查询一个月对应的英文命名和最大天数
function monthAndMaxDay(year, month) {
	let month_now = "";
	let maxDay = 0; // 一个月的最大天数
	switch (month + 1) {
		case 1:
			month_now = "January";
			maxDay = 31;
			break;
		case 2:
			month_now = "February";
			if (year % 4 != 0) {
				maxDay = 28;
			} else {
				maxDay = 29;
			}
			break;
		case 3:
			month_now = "March";
			maxDay = 31;
			break;
		case 4:
			month_now = "April";
			maxDay = 30;
			break;
		case 5:
			month_now = "May";
			maxDay = 31;
			break;
		case 6:
			month_now = "June";
			maxDay = 30;
			break;
		case 7:
			month_now = "July";
			maxDay = 31;
			break;
		case 8:
			month_now = "August";
			maxDay = 31;
			break;
		case 9:
			month_now = "September";
			maxDay = 30;
			break;
		case 10:
			month_now = "October";
			maxDay = 31;
			break;
		case 11:
			month_now = "November";
			maxDay = 30;
			break;
		case 12:
			month_now = "December";
			maxDay = 31;
			break;
		default:
			month = "";
	}
	return [month_now, maxDay];
}

// 更新当前月的所有天数
function updateAllDays(year, month) {
	let offset = dayToStar(year, month, 1);
	let maxDay = monthAndMaxDay(year, month)[1];

	// 实现日期和星期对应
	for (let i = 0; i < offset; i++) {
		let day = document.createElement("li");
		day.className = "no-style";
		days.appendChild(day);
	}
	for (let i = 1; i <= maxDay; i++) {
		let day = document.createElement("li");
		let dateNow = new Date();
		let nowDataTask = false
		// 当前日期有绿色背景
		if (year == dateNow.getFullYear() && month == dateNow.getMonth() && i == dateNow.getDate()) {
			for (let j = 0; j < list.length; j++) {
				let valDate = list[j].split('-')
				if (parseInt(valDate[0]) == parseInt(year) && parseInt(valDate[1]) == parseInt((month + 1)) && parseInt(
						valDate[2]) == parseInt(i)) {
					nowDataTask = true
					day.className = 'style-default bg-style size-red'
					break
				}
			}
			if (!nowDataTask) {
				day.className = "style-default bg-style"
			}
		} else {
			for (let j = 0; j < list.length; j++) {
				let valDate = list[j].split('-')
				if (parseInt(valDate[0]) == parseInt(year) && parseInt(valDate[1]) == parseInt((month + 1)) && parseInt(
						valDate[2]) == parseInt(i)) {
					nowDataTask = true
					day.className = 'style-default size-red'
					break
				}
			}
			if (!nowDataTask) {
				day.className = "style-default";
			}
		}

		day.id = i;
		day.innerText = i
		day.onclick = function(val) {
			console.log(Y, M + 1, i, 123)
			url = './programme.html?year=' + Y + "&month=" + (M + 1) + "&day=" + i;
			window.open(url, '_blank')
		}
		days.appendChild(day);
	}

}

// 选择按月切换还是按年切换
function selected(boolean) {
	if (boolean) {
		monthNow.style.textShadow = "2px 2px 2px rgb(121, 121, 121)";
		yearNow.style.textShadow = "none";
	} else {
		monthNow.style.textShadow = "none";
		yearNow.style.textShadow = "2px 2px 2px rgb(121, 121, 121)";
	}
}

// 点击切换事件
function changePage(boolean) {
	// 按年切换还是按月切换
	if (isSelect) {
		// 向前切换还是向后切换
		if (boolean) {
			M = M - 1;
			if (M == -1) {
				Y--;
				M = 11;
			}
		} else {
			M = M + 1;
			if (M == 11) {
				Y++;
				M = 0;
			}
		}
	} else {
		if (boolean) {
			Y--;
		} else {
			Y++;
		}
	}
	yearNow.innerHTML = Y;
	monthNow.innerHTML = monthAndMaxDay(Y, M)[0];
	// 清空一个月所有天数
	days.innerHTML = "";
	// 重新添加一个月所有天数
	updateAllDays(Y, M);
}

// function allClick() {
// 	var liId = document.getElementsByTagName('li')
// 	let maxDay = monthAndMaxDay(year, month)[1];
// 	for(var i = 0; i < maxDay; i++) {
// 		liId[i].
// 	}
// }
// allClick()
