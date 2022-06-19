import {ajax} from "./modules.js";

const status = document.getElementById("status");

if(Cookies.get("image")) {
    console.log("image here");
    const picture = document.getElementById("user-picture");
    const url = Cookies.get("image");
    picture.src = url;
} else {
    console.log('no image');
}


ajax({
    type: "POST",
    url: "/application/account_details"
}).then((result) => {
    let response = JSON.parse(result);
    console.log(response);
    const total = document.getElementById("total");
    const current = document.getElementById("current");
    const progress = document.getElementById("progress");
    total.innerHTML = `Total lessons: ${response.total_lessons};`;
    current.innerHTML = `Current lesson: ${response.current_lesson};`;
    progress.innerHTML = `Your current progress is: ${response.status};`;
});

var table = new Tabulator("#result-table", {
    height: "311px",
    layout: "fitColumns",
    placeholder: "Loading...",
    columns: [
        {title: "Name", field: "username", sorter: "string", width: 200},
        {
            title: "Progress", field: "status", sorter: "number", formatter: "progress", formatterParams: {
                min: 0,
                max: 100,
                color: ["#E84646", "#faa200", "#4cb3fd"],
                legend: function(value) {return value;},
                legendColor: "#fff",
                legendAlign: "center",
            },
            width: 200
        },
        {title: "Current Lesson", field: "lesson_name", sorter: "string"},
        {title: "Current Chapter", field: "chapter_name", hozAlign: "center"},
    ],
});


document.getElementById("ajax-trigger").addEventListener("click", function () {
    document.getElementById("leaderboards").style.display = "block";
    table.setData("/application/leaderboards");

    const interval = window.setInterval(() => {
        table.setData("/application/leaderboards");
    }, 60000);
});