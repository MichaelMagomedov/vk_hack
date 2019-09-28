/*--------loader script-----------*/
$(function () {
    var loading = $('#loadbar').hide()
    $(document)
        .ajaxStart(function () {
            loading.show()
        }).ajaxStop(function () {
        loading.hide()
    })
    var test = {
        "id": 1,
        "name": "\u0422\u0435\u0441\u0442",
        "category": "\u041c\u043e\u043b\u043e\u0434\u044b\u0435 \u0421\u0435\u043c\u044c\u0438",
        "desc": "\u041e\u043f\u0438\u0441\u0430\u043d\u0438\u0435 \u0442\u0435\u0441\u0442\u0430",
        "img": "95KjIqEjbfkJzOQjvjveMZNQ6CB2Oybo41iaRMRu.jpeg",
        "questions": [{
            "id": 1,
            "text": "\u0412\u043e\u043f\u0440\u043e\u0441 1",
            "img": "V0Atgd3uuuUrD9VV0OyF27k4tRJmnxVzJKB3RzyF.jpeg",
            "test_id": 1,
            "parent_id": null,
            "answers": [{
                "id": 1,
                "text": "\u041e\u0442\u0432\u0435\u0442 1",
                "question_id": 1,
                "next_question_id": 2
            }, {"id": 2, "text": "\u041e\u0442\u0432\u0435\u0442 2", "question_id": 1, "next_question_id": 2}, {
                "id": 3,
                "text": "\u041e\u0442\u0432\u0435\u0442 3",
                "question_id": 1,
                "next_question_id": 2
            }]
        }, {
            "id": 2,
            "text": "\u0412\u043e\u043f\u0440\u043e\u0441 2",
            "img": null,
            "test_id": 1,
            "parent_id": 1,
            "answers": [{
                "id": 4,
                "text": "\u041e\u0442\u0432\u0435\u0442 1",
                "question_id": 2,
                "next_question_id": null
            }, {"id": 5, "text": "\u041e\u0442\u0432\u0435\u0442 2", "question_id": 2, "next_question_id": null}]
        }]
    }
    $.get("https://demo18.alpha.vkhackathon.com/test/1", function (data) {
        test = data
        for (var question in test.questions) {
            if (test.questions[question].parent_id === null) {
                renderQuestion(test.questions[question])
            }
        }
    })

    var questionNo = 0
    var correctCount = 0


    $(document.body).on('click', "label.element-animation", function (e) {
        //ripple start
        var parent, ink, d, x, y
        parent = $(this)
        if (parent.find(".ink").length == 0)
            parent.prepend("<span class='ink'></span>")

        ink = parent.find(".ink")
        ink.removeClass("animate")

        if (!ink.height() && !ink.width()) {
            d = Math.max(parent.outerWidth(), parent.outerHeight())
            ink.css({height: "100px", width: "100px"})
        }

        x = e.pageX - parent.offset().left - ink.width() / 2
        y = e.pageY - parent.offset().top - ink.height() / 2

        ink.css({top: y + 'px', left: x + 'px'}).addClass("animate")

        var choice = $(this).parent().find('input:radio').val()

        setTimeout(function () {
            $('#loadbar').show()
            $('#quiz').fadeOut()
            let answer = findAnswerById(choice)
            let question = findQuestionById(answer.next_question_id)
            if (!question) {
                alert('Ok')
            }
            renderQuestion(question)
            setTimeout(function () {
                $('#quiz').show()
                $('#loadbar').fadeOut()
            }, 1500)
        }, 1000)
    })

    function findAnswerById(id) {
        var questions = test.questions
        for (let question in questions) {
            let answers = questions[question].answers
            for (let answer in answers) {
                if (answers[answer].id == id) {
                    return answers[answer]
                }
            }
        }
    }

    function findQuestionById(id) {
        for (let question in test.questions) {
            if (test.questions[question].id == id) {
                return test.questions[question]
            }
        }
    }

    function renderQuestion(question) {
        $('#qid').html(question.id)
        setTimeout(function () {
            $('#quiz').show()
            $('#loadbar').fadeOut()
        }, 1500)
        $('#question').html(question.text)
        $('.question-img').html('')
        $('.question-img').append(
            '<img src="https://demo18.alpha.vkhackathon.com/storage/' + question.img + '" class="img img-responsive quiz-image" alt="">'
        )
        $('#answers').html('')
        for (answer in question.answers) {
            var tmp =
                '<li>\n' +
                '<input type="radio" id="' + question.answers[answer].id + '-option" name="selector" value="' + question.answers[answer].id + '">\n' +
                '<label for="' + question.answers[answer].id + '-option" class="element-animation">' + question.answers[answer].text + '</label>\n' +
                '<div class="check"></div>\n' +
                '</li>'
            $('#answers').append(tmp)
            // $($('#f-option').parent().find('label')).html(answer.text)
        }
    }

    $.fn.checking = function (qstn, ck) {
        var ans = q[questionNo].A
        if (ck != ans)
            return false
        else
            return true
    }
})
