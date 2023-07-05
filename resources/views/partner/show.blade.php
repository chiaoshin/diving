@extends("layouts/app")


@section("head")
<link href="{{ asset("css/partner.css") }}" rel="stylesheet">
@endsection

@section("body")
<div class='row'>
    <div class='col-12 col-sm-10 p-5  m-auto'>
        <main class="table">
            <section class="table__header">
                <h2><b>尋找潛伴 looking for a partner</b></h2>
                <img src="{{asset('img/partner/abc.png')}}" alt="" class="size">
            </section>

            <section class="table__body">
                <table>
                    <thead>
                        <tr>
                            <th class="text-center tc"> ID </th>
                            <th class="text-center tc"> customer </th>
                            <th class="text-center tc"> 出團日 </th>
                            <th class="text-center tc"> 地點 </th>
                            <th class="text-center tc"> 金額 </th>
                            <th class="text-center tc"> email </th>
                            <th class="text-center tc"> 潛水類型 </th>
                            <th class="text-center tc"> 有無考證 </th>
                            <th class="text-center tc"> 人數限制 </th>
                            <th class="text-center tc"> 目前人數 </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $row)
                        <tr>
                            <td class="text-center tc">{{ $row->partner_id }}</td>
                            <td class="text-center tc">
                                @if($row->partner_id % 2 == 0)
                                <img src="{{ asset('img/partner/girl.jpg') }}" alt="">
                                @else
                                <img src="{{ asset('img/partner/boy.jpg') }}" alt="">
                                @endif
                            </td>
                            <td class="text-center tc">{{ $row->format_date }}</td>
                            <td class="text-center tc">{{ $row->location }}</td>
                            <td class="text-center tc">${{ number_format($row->money) }}</td>
                            <td class="text-center tc">{{ $row->email }}</td>
                            <td class="text-center tc">{{ $row->type }}</td>
                            <td class="text-center tc">{{ $row->license }}</td>
                            <td class="text-center tc">{{ $row->people_limit }}</td>
                            <td class="text-center tc">
                                <p class="status {{ $row->people_number <= 4 ? $row->people_number <= 2 ? 'cancelled' : 'pending' : 'delivered' }}">{{ $row->people_number }}</p>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </section>

        </main>
    </div>
</div>
@endsection