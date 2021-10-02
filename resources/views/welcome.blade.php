<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <!-- Style -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <title>Laravel</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    </head>
    <body class="antialiased">
    <div class="border-b-4 font-bold p-4 text-5xl text-center text-gray-500">
        <h1>Laravel CRUD Using Axios</h1>
    </div>

    <div class="grid grid-cols-3">
        <div class="col-span-2 p-12">
            <div>
                <h1 class="font-bold text-2xl text-center border-b-2">All User Data</h1>
            </div>
            <div class="flex font-bold p-3 text-2xl">
                    <p class="text-center w-1/3">ID</p>
                    <p class="text-center w-1/3">Full Name</p>
                    <p class="text-center w-1/3">Action</p>
                </div>
            <div class="flex mt-2 border-r-2">
                    <div id="id" class="w-1/3"></div>
                    <div id="getName" class="w-1/3"></div>
                    <div id="action" class="w-1/3">
                    </div>
                </div>
        </div>

        <div class="p-12">
            <h1 class="font-bold text-2xl text-center border-b-2"> Add New User</h1>
            <form class="mt-16 text-center" id="addFormData">
                <div>
                    <label for="name" class="font-bold">Name: </label>
                    <input type="text" id="name" placeholder="Enter User Name..." class="border-2 h-9 text-center rounded">
                </div>
                <div>
                    <input type="submit" id="submit" value="SUBMIT" class="bg-blue-500 p-2 rounded text-white w-full mt-3">
                </div>
            </form>
        </div>
    </div>

    <!-- Axios CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.22.0/axios.min.js"
            integrity="sha512-m2ssMAtdCEYGWXQ8hXVG4Q39uKYtbfaJL5QMTbhl2kc6vYyubrKHhr6aLLXW4ITeXSywQLn1AhsAaqrJl8Acfg=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- jQuery CDN -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
            integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
            crossorigin="anonymous"></script>
    <!-- Script -->
    <script>
        function getAllCustomer(){
            let i =0;
            axios({
                method: 'get',
                url: '{{ route('index') }}'
            }).then(function (response){
                $.each(response.data, function (key, value){
                $('#id').append( '<div id="remove" class="text-center mt-3"><p class="text-center p-2">'+ ++i +'</p></div>')
                $('#getName').append( '<div  id="remove" class="text-center mt-3"><p class="text-center p-2">'+ value.name +'</p></div>')
                $('#action').append(
                    '<div id="remove" class="text-center mt-3 ">' +
                    '<input class="p-2 bg-blue-500 text-white rounded mr-1" type="button" value="Update">' +
                    '<input class="p-2 bg-red-500 text-white rounded mr-1" type="button" value="Delete">' +
                    '<input class="p-2 bg-yellow-500 text-white rounded" type="button" value="View">'
                    + '</div>'
                )
                })
            })
        }

        getAllCustomer();
        $("#submit").on("click", (e)=>{
            e.preventDefault()
            const value = $("#name").val()
            axios({
                method: 'post',
                url: '{{ route("store") }}',
                data: {
                    name: value
                }
            }).then(function (response) {
                console.log(response);
                $('[id="remove"]').remove()
                $("#name").val('')
                getAllCustomer()
            }).catch(function (error) {
                console.log(error)
            });
        })
    </script>
    </body>
</html>
