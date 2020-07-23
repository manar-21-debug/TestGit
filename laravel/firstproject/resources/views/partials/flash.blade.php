


@if(session()->has('success'))
<div class="alert alert-success">
         <h1>{{ session()->get('success') }}</h1>
   </th>

</div>
 @endif
