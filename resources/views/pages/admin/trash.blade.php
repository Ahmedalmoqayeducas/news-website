@extends('layouts.dashboard')
{{-- find a way to active a number of rows in the one page, and the --}}
@section('content')
<div class="card">
    <header class=" card-header noborder">
        <h4 class="card-title">Advanced Table Two</h4>
    </header>
    <div class="card-body px-6 pb-6">
        <div class="overflow-x-auto -mx-6 dashcode-data-table">
            <span class=" col-span-8  hidden"></span>
            <span class="  col-span-4 hidden"></span>
            <div class="inline-block min-w-full align-middle">
                <div class="overflow-hidden ">
                    <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper no-footer">

                        <div class="min-w-full">
                            <table
                                class="min-w-full divide-y divide-slate-100 table-fixed dark:divide-slate-700 data-table dataTable no-footer"
                                id="DataTables_Table_0">
                                <thead class=" bg-slate-200 dark:bg-slate-700">
                                    <tr>
                                        <th scope="col" class="table-th sorting sorting_asc" tabindex="0"
                                            aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                                            aria-sort="ascending" aria-label=" Id : activate to sort column descending"
                                            style="width: 23.0625px;">
                                            Id
                                        </th>

                                        <th scope="col" class="table-th sorting" tabindex="0"
                                            aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                                            aria-label="  Customer  : activate to sort column ascending"
                                            style="width: 143.438px;">
                                            Admin
                                        </th>
                                        <th scope="col" class="table-th sorting" tabindex="0"
                                            aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                                            aria-label=" Date : activate to sort column ascending"
                                            style="width: 83.984px;">
                                            Delete date
                                        </th>
                                        <th scope="col" class="table-th sorting" tabindex="0"
                                            aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                                            aria-label=" Quantity : activate to sort column ascending"
                                            style="width: 74.219px;">
                                            Email
                                        </th>


                                        <th scope="col" class="table-th sorting" tabindex="0"
                                            aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                                            aria-label=" Action : activate to sort column ascending"
                                            style="width: 113.016px;">
                                            Action
                                        </th>
                                    </tr>
                                </thead>
                                <tbody
                                    class="bg-white divide-y divide-slate-100 dark:bg-slate-800 dark:divide-slate-700">
                                    @foreach ($data as $element)


                                    <tr class="even" id="element_{{ $element->id }}">
                                        <td class="table-td sorting_1">{{ $loop->index+1 }}</td>
                                        <td class="table-td">
                                            <span class="flex">
                                                <span class="w-7 h-7 rounded-full ltr:mr-3 rtl:ml-3 flex-none">
                                                    <img src="assets/images/all-img/customer_1.png" alt="10"
                                                        class="object-cover w-full h-full rounded-full">
                                                </span>
                                                <span class="text-sm text-slate-600 dark:text-slate-300 capitalize">{{
                                                    $element->name }}</span>
                                            </span>
                                        </td>
                                        <td class="table-td ">{{ $element->deleted_at }}</td>
                                        <td class="table-td ">

                                            {{ $element->email }}

                                        </td>

                                        <td class="table-td ">
                                            <div class="flex space-x-3 rtl:space-x-reverse">
                                                <button type="button" onclick="restore({{ $element->id }})"
                                                    class="action-btn">
                                                    <iconify-icon icon="heroicons:eye"></iconify-icon>
                                                </button>

                                                <button type="button" onclick="destroy({{ $element->id }})"
                                                    class="action-btn">
                                                    <iconify-icon icon="heroicons:trash"></iconify-icon>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="container">
                                {{ $data->links() }}
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    function restore(id){
        axios.get(`/dash/admin/trash/${id}`).then(function(response){
            // document.getElementById(`user_${id}`).remove();
            document.getElementById(`element_${id}`).remove();
            toastr.success(response.data.message);
        }).catch(function(info){
            toastr.info(info.response.data.message);
        });
    }
    function destroy(id){
        axios.delete(`/dash/admin/trash/${id}`).then(function(response){
            // document.getElementById(`user_${id}`).remove();
            document.getElementById(`element_${id}`).remove();
            toastr.success(response.data.message);
        }).catch(function(info){
            toastr.info(info.response.data.message);
        });
    }
</script>
@endsection