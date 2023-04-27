@extends('staff.main.app')
@section('content')
<section class="content">
  <a href="{{ route('staff.detail.create') }}" class="btn btn-sm btn-info text-capitalize rounded-0" data-toggle="tooltip" data-placement="top" title="Add Address">Add Data</a>
  <div class="card">
    <div class="table-responsive">
      <table class="table table-bordered table-hover m-0 table-sm">
        <thead class="bg-dark">
          <tr class="text-center">
            <th width="10">SN</th>
            <th>Name</th>
            <th>Address</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          {{-- @foreach($datas as $key => $student)
          <tr class="text-center">
            <td>{{$key+1}}</td>
            <td>{{$student->user_name}}</td>
            <td>{{$student->name}}</td>
            <td>
              <form action="{{ route('staff.student.destroy',$student->id) }}" method="post" class="d-inline-block delete-confirm" data-placement="top" title="Permanent Delete">
                @csrf
                @method('DELETE')
                <button class="btn btn-xs btn-outline-danger" type="submit"><i class="fa fa-trash"></i></button>
              </form>
            </td>
          </tr>
          @endforeach --}}
        </tbody>
      </table>
    </div>
  </div>
</section>
@endsection
@push('javascript')
<script type="text/javascript">
  for(let i= 0; i < 10; i++)
  {
    // console.log(i,);
  }
</script>
<script type="text/javascript">
let i = 4;
// while(i < 4)
// {
//   console.log(i);
//   i++;
// }  
do{
  // console.log(i);
  i++;
}while(i<4)

</script>
<script>
  let objs = {
    monika: 90,
    milan:80,
    sitam:70,
  } 
  // console.log(Object.keys(objs)[0]);
</script>
<script type="text/javascript">
  let boy1 = "milan";
  let boy2 = "khimding";
  let fullname = "my name is" + boy1;
  // let fullname = `my name is ${boy1}`;
  // console.log(fullname);

</script>
<script>
  let a = "milan";
  // console.log(a.toUpperCase());
  // console.log(a.slice(2,4));
  // console.log(a.replace("m","n"));
  let num = [2, 3, 5];
  // let joins = num.concat('2');
  // let try1 = num.pop();
  let try2 = num.push(6);
  let try3 = num.shift();
  let try4 = num.unshift(0);
  // console.log(try4,num.length);
  let array = [10,11,12,13,14,15];
  let new_array = num.concat(array);
  let new_data = array.splice(2,2,51,52);
  // console.log(new_data,array);
  // console.log(array.length);
  // console.log(delete(array[0]),array,array.length);
  // console.log(new_array);
  // console.log(array.reverse());
  array.forEach((element) =>{
    // console.log(element*element);
  })

  let name = "Hari";
  let arr = Array.from(name);
  // console.log(arr);
</script>
<script>
  let arrays = [2,3,4];
  // let m =arrays.map((value) => {
  //   return value * 1;
  // })
  // let n = arrays.filter((value)=>{
  //   return value > 3;
  // })
  let p = arrays.reduce((value, data ) => {
    return value * data;
  })
    console.log(p);
</script>
@endpush