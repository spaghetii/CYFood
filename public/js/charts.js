$(document).ready(function () {

    var dataList = [];
    var labelList = [];
    for (let i = 0; i <= 31; i++) {
        let dataItem = Math.floor(Math.random() * 100);
        labelList.push(i);
        dataList.push(dataItem);
    }

    
    var ctx = document.getElementById("chartNameOrderschartYear2019chartMonth9");
    var labChart = new Chart(ctx,{
        type: "bar",
        data: {
            labels: labelList,
            datasets: [
                {
                    label: "訂單數",
                    data: dataList,
                    fill: false,
                    // 著色:
                    backgroundColor: "rgba(14,72,100,0.2)",
                    borderColor: "rgba(14,72,100,1.0)",
                    borderWidth: 1
                }
            ]
        }
    })
})