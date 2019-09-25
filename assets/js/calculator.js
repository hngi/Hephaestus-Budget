// Load google charts
google.charts.load('current', { 'packages': ['corechart'] });
google.charts.setOnLoadCallback(drawChart);

// Draw the chart and set the chart values
function drawChart() {
    var data = google.visualization.arrayToDataTable([
        ['Task', 'Hours per Day'],
        ['Work', 8],
        ['Eat', 2],
        ['TV', 4],
        ['Gym', 2],
        ['Sleep', 8]
    ]);

    // Optional; add a title and set the width and height of the chart
    var options = { 'title': 'My Average Day', 'width': 400, 'height': 400 };

    // Display the chart inside the <div> element with id="piechart"
    var chart = new google.visualization.PieChart(document.getElementById('piechart'));
    chart.draw(data, options);
}



const amount = document.querySelector('.amount');
const add = document.querySelector('.add-icon');
const item = document.querySelector('#item')
const prior = document.querySelector('#prior')




function addNew() {
    const html1 = `<input class="exp" type="text">`
    item.insertAdjacentHTML('beforeEnd', html1)
    const html2 = `<div class="prior">
    <select class="in">
        <option>Top</option>
        <option>Medium</option>
        <option>Low</option>
    </select>
    <ion-icon class="del" name="close-circle"></ion-icon>
    </div>`
    prior.insertAdjacentHTML('beforeEnd', html2)
}

add.addEventListener('click', addNew)