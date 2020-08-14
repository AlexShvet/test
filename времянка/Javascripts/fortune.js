$(document).ready(function () {
    let counter_answer = Number(0);
    function ajax() {
        let data = $(".input_name").val(); //берем значение из инпута
        if(data !== ""){
            $.ajax({
                type: "POST",
                url: "../fortune.php",
                data: { name: data},
                success: function (answer_fortune_js) {
                    $(".answer_fortune_js").html(answer_fortune_js);
                },
                statusCode: {
                    200: function () {}
                }
            });
            counter_answer++;
        }
        return counter_answer;
    }
    $(".input_name").keydown(function (k) { //keydown - нажатие на клавишу
        if (k.keyCode === 13) { //13 - код клавиши энтер
            if (counter_answer < 1) {
                counter_answer = ajax();
            }
        }
    });
    $(document).mouseup(function (e) {//клик по пустому месту
        if (!$(".input_name").is(e.target)) {//если клик не по инпуту
            if (counter_answer < 1) {
                counter_answer = ajax();
            }
        }
    })
});