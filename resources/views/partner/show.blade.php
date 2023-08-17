@extends("layouts/app")


@section("head")
<link href="{{ asset("css/partner.css") }}" rel="stylesheet">
@endsection

@section("body")
<div class='row'>
    <div class='col-12 col-sm-10 p-4 m-auto'>
        <main class="table">
            <section class="table__header">
                <h2><b>尋找潛伴 looking for a partner</b></h2>
                <div class="input-group">
                    <input type="text" id="searchInput" placeholder="Search Data...">
                    <img src="{{ asset('img/partner/search.png') }}" alt="">
                </div>
                <img src="{{ asset('img/partner/abc.png') }}" alt="" class="size">
            </section>

            <section class="table__body">
                <table>
                    <thead>
                        <tr>
                            <th class="text-center tc"> ID </th>
                            <th class="text-center tc"> customer </th>
                            <th class="text-center tc" onclick="sortTableByDate()"> 出團日 </th>
                            <th class="text-center tc"> 地點 </th>
                            <th class="text-center tc"> 金額 </th>
                            <th class="text-center tc"> email </th>
                            <th class="text-center tc"> 潛水類型 </th>
                            <th class="text-center tc"> 有無考證 </th>
                            <th class="text-center tc"> 人數限制 </th>
                            <th class="text-center tc"> 目前人數 </th>
                        </tr>
                    </thead>
                    <tbody id="tbody">
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
@section('script')
<script>
    const data = @json($data)

    const compareDate = (a, b) => {
        return new Date(a.group_time) - new Date(b.group_time)
    }

    $(function(){
        $("#searchInput").change(function() {
            let tbody = ""
            let filter_data = data
                .filter(r => r.location.includes($(this).val()) || r.type.includes($(this).val()))
                .sort(compareDate)
                .forEach(row => {
                    let d = new Date(row.group_time)
                    let d_str = `${d.getFullYear()}年${d.getMonth() + 1}月${d.getDate()}號`
                    tbody += `
                        <tr>
                            <td class="text-center tc">${row.partner_id}</td>
                            <td class="text-center tc">
                                ${
                                    row.partner_id % 2 == 0 ?
                                    "<img src='{{ asset('img/partner/girl.jpg') }}' alt=''>" :
                                    "<img src='{{ asset('img/partner/boy.jpg') }}' alt=''>"
                                }
                            </td>
                            <td class="text-center tc">${d_str}</td>
                            <td class="text-center tc">${row.location}</td>
                            <td class="text-center tc">${row.money.toLocaleString()}</td>
                            <td class="text-center tc">${row.email}</td>
                            <td class="text-center tc">${row.type}</td>
                            <td class="text-center tc">${row.license}</td>
                            <td class="text-center tc">${row.people_limit}</td>
                            <td class="text-center tc">
                                <p class="status ${row.people_number <= 4 ? row.people_number <= 2 ? 'cancelled' : 'pending' : 'delivered'}">${row.people_number}</p>
                            </td>   
                        </tr>
                    `
                })

            $("#tbody").html(tbody)
        })
    })
</script>
{{-- <script>
    function filterTable() {
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("searchInput");
        filter = input.value.toUpperCase();
        table = document.getElementById("dataTable");
        tr = table.getElementsByTagName("tr");

        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[3]; // 搜索第4列，"地點"列
            if (td) {
                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
            
        }
    }
    let isAscending = true;

    function sortTableByDate() {
        const table = document.getElementById("dataTable");
        const rows = Array.from(table.getElementsByTagName("tr"));
       

        rows.sort(function (a, b) {
            const aValue = a.getElementsByTagName("td")[2].innerText; // 第三列是出團日
            const bValue = b.getElementsByTagName("td")[2].innerText;
        
            const aDate = new Date(aValue).getTime();
            const bDate = new Date(bValue).getTime();
        
            return isAscending ? aDate - bDate : bDate - aDate;
        });
    
        // 移除現有的行
        while (table.rows.length > 0) {
            table.deleteRow(0);
        }
    
        // 重新添加排序後的行
        
        rows.forEach(function (row) {
            table.appendChild(row);
        });
    
        isAscending = !isAscending;
    }

    document.addEventListener("DOMContentLoaded", function () {
        const currentDate = new Date();
        const rows = document.querySelectorAll("tbody tr");
        const visibleRows = [];

        rows.forEach(row => {
            const rowDateParts = row.cells[2].textContent.split("-");
            const rowDate = new Date(
                rowDateParts[0], 
                parseInt(rowDateParts[1]) - 1, 
                rowDateParts[2]
            );
            
            if (rowDate >= currentDate) {
                row.setAttribute("data-date-visible", "true");
            } else {
                row.setAttribute("data-date-visible", "false");
            }
        });

        const tbody = document.querySelector("tbody");
        tbody.innerHTML = "";
        rows.forEach(row => {
            if (row.getAttribute("data-date-visible") === "true") {
                tbody.appendChild(row.cloneNode(true));
            }
        });
    });

</script> --}}
@endsection