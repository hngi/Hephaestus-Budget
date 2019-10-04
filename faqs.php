<!DOCTYPE html>
<html>

<head>
    <title>Hephaestus - Frequently Asked Question</title>
    <link rel="stylesheet" type="text/css" media="screen" href="contact.css" />
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="assets/css/style.css" />

    <style>
        @import url('https://fonts.googleapis.com/css?family=Hind:300,400');

        *,
        *:before,
        *:after {
            -webkit-box-sizing: inherit;
            box-sizing: inherit;
        }

        html {
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
        }

        body {
            margin: 0;
            padding: 0;
            font-family: 'Hind', sans-serif;
            background: #fff;
            color: #4d5974;
            min-height: 100vh;
        }

        .containers {
            margin: 0 auto;
            padding: 4rem;
            width: 48rem;
        }

        h3 {
            font-size: 1.75rem;
            color: #373d51;
            padding: 1.3rem;
            margin: 0;
        }

        .accordion a {
            position: relative;
            display: -webkit-box;
            display: -webkit-flex;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-orient: vertical;
            -webkit-box-direction: normal;
            -webkit-flex-direction: column;
            -ms-flex-direction: column;
            flex-direction: column;
            width: 100%;
            padding: 1rem 3rem 1rem 1rem;
            color: #7288a2;
            font-size: 1.6rem;
            font-weight: 400;
            border-bottom: 1px solid #e5e5e5;
        }

        .accordion a:hover,
        .accordion a:hover::after {
            cursor: pointer;
            color: #03b5d2;
        }

        .accordion a.active {
            color: #03b5d2;
            border-bottom: 1px solid #03b5d2;
        }

        .accordion a::after {
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            content: "v";
            position: absolute;
            float: right;
            right: 1rem;
            font-size: 1rem;
            color: #7288a2;
            padding: 5px;
            width: 30px;
            height: 30px;
            text-align: center;
        }

        .accordion a.active::after {
            font-family: 'Ionicons';
            content: '^';
            font-size: 1.5rem;
            color: #03b5d2;
        }


        .accordion .contentful {
            opacity: 0;
            padding: 0 1rem;
            max-height: 0;
            border-bottom: 1px solid #e5e5e5;
            overflow: hidden;
            clear: both;
            -webkit-transition: all 0.2s ease 0.15s;
            -o-transition: all 0.2s ease 0.15s;
            transition: all 0.2s ease 0.15s;
        }

        .accordion .contentful p {
            font-size: 1.5rem;
            font-weight: 300;
        }

        .accordion .contentful.active {
            opacity: 1;
            padding: 1rem;
            max-height: 100%;
            -webkit-transition: all 0.35s ease 0.15s;
            -o-transition: all 0.35s ease 0.15s;
            transition: all 0.35s ease 0.15s;
        }
    </style>
</head>

<body>
    <?php include("partials/navigation.php"); ?>
    <div class="containers">
        <h2>Frequently Asked Questions</h2>
        <div class="accordion">
            <div class="accordion-item">
                <a>What is HephBudget?</a>
                <div class="contentful">
                    <p>As the name implies, it is a budget application that helps you create a quick spending plan
                        according to your available funds and based on the priority you have placed those potential
                        expenses/purchases.</p>
                </div>
            </div>
            <div class="accordion-item">
                <a>What are Priorities?
                </a>
                <div class="contentful">
                    <p>Priorities are values set in percentages that you can assign to you budget items to indicate
                        where it ranks in your scale of preference. Priorities are custom set by you in percentages from
                        High, Medium to Low. By custom ser, we mean you can determine if an item of High priority can
                        have a value 80%. By that, an item of medium priority should have a value lower that 80% and o
                        applies to the low priority item. </p>
                </div>
            </div>
            <div class="accordion-item">
                <a>How can I use HephBudget?</a>
                <div class="contentful">
                    <p>HephBudget application makes use of user Authentication, hence, to get started, signup for a
                        quick
                        account with a valid email address and password to gain authorization to the dashboard to create
                        a Budget.
                    </p>
                </div>
            </div>
            <div class="accordion-item">
                <a>How is HephBudget useful to me?</a>
                <div class="contentful">
                    <p>Say goodbye to unsolicited buys when you make use of the HephBudget App. Only make purchases
                        based on priority, a digital Scale of Preference, if you like the fancy terms.
                    </p>
                </div>
            </div>
            <div class="accordion-item">
                <a>Can I use it on my mobile device?</a>
                <div class="contentful">
                    <p>We took pride in making the HephBudget's interface adapts superbly to accommodate various devices
                        (mobile, tablet) and screen sizes, making it easy for users to quickly create budgets on the
                        fly.</p>
                </div>
            </div>
        </div>
        <section class="youtube-embed">
            <h2 style="margin-top: 5%;">Here is a quick video Guide to get you started:</h2>
            <div class="embed-responsive embed-responsive-16by9">
                <iframe width="560" height="315" src="https://www.youtube.com/embed/2hLQFFagdoI" frameborder="0"
                    allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen></iframe>
            </div>
        </section>
    </div>
    <script>
        const items = document.querySelectorAll(".accordion a");

        function toggleAccordion() {
            this.classList.toggle('active');
            this.nextElementSibling.classList.toggle('active');
        }

        items.forEach(item => item.addEventListener('click', toggleAccordion));
    </script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>

</body>

</html>