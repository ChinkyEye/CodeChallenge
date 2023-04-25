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
  console.log(fullname);

</script>
@endpush