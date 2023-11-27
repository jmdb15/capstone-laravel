<table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
              <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                  <tr>
                      <th scope="col" class="px-6 py-3">
                          Status
                      </th>
                      <th scope="col" class="px-6 py-3">
                          Sender
                      </th>
                      <th scope="col" class="px-6 py-3">
                          Offender
                      </th>
                      <th scope="col" class="px-6 py-3">
                          Type
                      </th>
                      <th scope="col" class="px-6 py-3">
                          Action
                      </th>
                  </tr>
              </thead>
              <tbody>
                @foreach ($reports as $report)
                  <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600" id="tr-{{$report->id}}">

                      <td class="px-6 py-4">
                          <div class="flex items-center">
                            @if ($report->checked == 0)
                              <div class="h-2.5 w-2.5 rounded-full bg-blue-500 me-2" id="greenc-{{$report->id}}"></div> <p class="inline" id="p-{{$report->id}}">Unread</p>
                            @elseif ($report->checked == 2)
                              <div class="h-2.5 w-2.5 rounded-full bg-transparent me-2" id="greenc-{{$report->id}}"></div> <p class="inline" id="p-{{$report->id}}">Took Action</p>
                            @else
                              <div class="h-2.5 w-2.5 rounded-full bg-transparent me-2" id="greenc-{{$report->id}}"></div> <p class="inline" id="p-{{$report->id}}">Read</p>
                            @endif
                          </div>
                      </td>
                    
                      <td class="pl-2">
                        <div class="flex items-center text-gray-900 dark:text-white">
                          <img class="w-10 h-10 rounded-full" src="{{($report->image) ? asset('storage/student/thumbnail/'.$report->image) : $default_img}}" alt="Jese image">
                          <div class="ps-3">
                              <div class="text-base font-semibold">{{$report->name}}</div>
                              <div class="font-normal text-gray-500">{{$report->email}}</div>
                          </div>  
                        </div>
                      </td>
                      
                      <th class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                          <img class="w-10 h-10 rounded-full" src="{{($report->users->image) ? asset('storage/student/thumbnail/'.$report->users->image) : $default_img}}" alt="Jese image">
                          <div class="ps-3">
                              <div class="text-base font-semibold">{{$report->users->name}}</div>
                              <div class="font-normal text-gray-500">{{$report->users->email}}</div>
                          </div>  
                      </th>

                      <td class="px-6 py-4">
                        <strong>
                          {{ucfirst($report->content)}}
                        </strong>
                      </td>
                      <td class="px-6 py-4">
                          <!-- Modal toggle -->
                          <a type="button" class="font-medium text-blue-600 dark:text-blue-500 hover:underline cursor-pointer" onclick="setReportId({{$report->id}})">View</a>
                          |
                          <a type="button" class="font-medium text-red-600 dark:text-red-500 hover:underline cursor-pointer" onclick="deleteReport({{$report->id}})">Delete</a>
                      </td>
                  </tr>
                @endforeach

              </tbody>
          </table>