<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          Browse Items
        </h2>

    </x-slot>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

    <div class="container">
      <div class="form-group mt-5">
      <input type="text" name="search" id="search" class="form-control" placeholder="Search Item" />
     </div>
     <div class="table-responsive">
      <h3 align="left">About <span id="search_result"></span> results</h3>
      <table class="table table-striped table-bordered">
       <thead>
        <tr>
          
         <th></th>
         <th>Product Name</th>
         <th>Price</th>
         <th>Seller Id</th>
        </tr>
       </thead>
       <tbody>

       </tbody>
      </table>
    </div>

    <script>
    $(document).ready(function(){

     search_data();

     function search_data(query = '')
     {
      $.ajax({
       url:"/browse/action",
       method:'GET',
       data:{query:query},
       dataType:'json',
       success:function(data)
       {
        $('tbody').html(data.searched_items);
        $('#search_result').text(data.summed_row);
       }
      })
     }

     $(document).on('keyup', '#search', function(){
      var query = $(this).val();
      search_data(query);
     });
    });
    </script>

</x-app-layout>
