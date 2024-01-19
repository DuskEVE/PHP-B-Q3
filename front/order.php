<div id="select">

    <h3 class="ct">線上訂票</h3>
    <div class="order">
        <div>
            <label for="movie">電影: </label>
            <select name="movie" id="movie"></select>
        </div>
        <div>
            <label for="date">日期: </label>
            <select name="date" id="date"></select>
        </div>
        <div>
            <label for="session">場次: </label>
            <select name="session" id="session"></select>
        </div>
        <div>
            <button onclick="booking()">確定</button>
            <button>重置</button>
        </div>
    </div>

</div>

<style>
    #room{
        background-image: url('./icon/03D04');
        background-position: center;
        background-repeat: no-repeat;
        width: 540px;
        height: 370px;
        margin: auto;
    }
</style>
<div id="booking">

    <div id="room">

    </div>
    <div id="info">
        <button onclick="$('#select').show();$('#booking').show()">上一步</button>
        <button>訂購</button>
    </div>

</div>

<script>
    let url = new URL(window.location.href);
    if(url.searchParams.has('id')){
        $(`movie option[value='${url.searchParams.get('id')}']`).prop('selected', true);
    }
    getMovies();

    $("#movie").on("change",function(){
        getDates($("#movie").val())
    })

    function getMovies(){
        $.get("./api/get_movies.php",(movies)=>{
            $("#movie").html(movies);
            console.log($("#movie").val())
            getDates($("#movie").val())
        })
    }
    function getDates(id){
        $.get("./api/get_dates.php",{id},(dates)=>{
            $("#date").html(dates);
            let movie=$("#movie").val()
            let date=$("#date").val()
            getSessions(movie,date)
        })
    }
    function getSessions(movie,date){
        $.get("./api/get_sessions.php",{movie,date},(sessions)=>{
                $("#session").html(sessions);
        })
    }
    function booking(){
        let order = {
            movie_id: $('#movie').val(),
            date: $('#date').val(),
            session: $('#session').val()
        };
        console.log(order);
        $.get('./api/booking.php', order, (booking) => {
            $('#booking').html(booking);
            $('#select').hide();
            $('#booking').show();
        });
    }

    // const getMovies = () => {
    //     $.get('./api/get_movies.php', (response) => {
    //         $('#movie').html(response);
    //         getDates();
    //         $('#moive').on('change', getDates);
    //     });
    // };
    // const getDates = () => {
    //     let id = $('#movie').val();
    //     console.log(id);
    //     $.get('./api/get_dates.php', {id}, (response) => {
    //         $('#date').html(response);
    //         $('#date').on('change', getSession);
    //     })
    // };
    // const getSession = () => {
    //     let id = $('#movie').val();
    //     let date = $('#date').val();
    //     $.get('./api/get_sessions.php', (response) => {
    //         $('#session').html(response);
    //     })
    // };

    // getMovies();
    // $('#moive').on('change', getMovies);

</script>