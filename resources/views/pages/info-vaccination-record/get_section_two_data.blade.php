<table id="example3" class="display " style="min-width: 1019px">

    <thead>
        <tr style="height: 35px;border: 1px solid;background: #2e1919;color: white;">
            <th>SL.NO</th>
            <th>Vaccine</th>
            <th>Manufacturer</th>
            <th>Location</th>
            {{-- <th>Cirtificate No</th>
            <th>Dose 1</th>
            <th>Dose 2</th>
            <th>Dose 3</th>
            <th>Dose 4</th>
            <th>Dose 5</th>
            <th>Booster</th>
            <th>file</th> --}}
        </tr>
    </thead>
    <tbody>
       @foreach($sectiontwodata as $data)
         <tr >
             <td>{{$loop->iteration}}</td>
             <td>{{$data->vaccine}}</td>
             <td>{{$data->manufacturer}}</td>
             <td>{{$data->location}}</td>
         
             {{-- <td>{{$data->certificate_number}}</td>
             <td>{{$data->dose_01}}</td>
             <td>{{$data->dose_02}}</td>
             <td>{{$data->dose_03}}</td>
             <td>{{$data->dose_04}}</td>
             <td>{{$data->dose_05}}</td>
             <td>{{$data->booster}}</td> --}}
             <td>
                <img src="{{asset($data->upload_tool)}}" alt="" style="width: 50px;height: 50px">
         </td>
         </tr>
 
       @endforeach
           
    </tbody>
 </table>