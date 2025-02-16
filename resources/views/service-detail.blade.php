@extends('layout.master') <!-- Make sure the path matches your folder structure -->

@section('content')

<div class="detail_title">
    <h1>{{$service->name}}</h1>

</div>
<div class="detail_desc">
    <div class="detail_desc_img">
        <!-- Content for general cleaning details goes here -->
        <img src="{{asset('assets/images/cleaning1.jpg')}}" alt="">
    </div>
    <div class="detail_desc_text">
        <article>
            {{$service->description_text}}
        </article>

        {{-- <ul>
            <li>Layanan pembersihan untuk apartemen, rumah dan kantor yang dilakukan profesional cleaners. </li>
            <li>Jangkauan layanan Home Cleaning Service atau pembersihan dari KliknClean tersedia di kota Bali, Bandung, Bekasi, Bogor, Depok, Jakarta, Medan, Pontianak, Surabaya, Tangerang.</li>
            <li>Peralatan lengkap.</li>
            <li>Tenaga kerja berpengalaman dan terpercaya.</li>
        </ul> --}}
        
        @foreach($service->description_poin as $poin)
            <ul>
                <li>{{ $poin }}</li>
            </ul>
        @endforeach

        <button>
            Pesan Sekarang
        </button>
        
    </div>
</div>
@endsection


{{-- <tr>
    <td>{{ $dt['id'] }}</td>
    <td>{{ $dt['name'] }}</td>
    <td>{{ $dt['description_text'] }}</td>
  
    <td>
      @foreach($dt['description_poin'] as $poin)
        <span>{{ $poin }}</span><br>
      @endforeach
    </td>
    <td>{{ $dt['price'] }}</td>
    <td>
    <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modalUpdate{{ $dt['id'] }}">Edit</button>
      || 
      <a href="/admin-services/{{ $dt['id'] }}" onclick="return confirm('Apakah Anda Yakin Menghapus Data?');" class ="btn btn-danger btn-sm">Hapus</a>
    </td>
  </tr> --}}
