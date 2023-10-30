@php
  $def_profile = 'https://avatars.dicebear.com/api/initials/'.$user->name.'.svg';
@endphp
<tr class="bg-white border-b hover:bg-gray-50">
  <th scope="row" class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap">
      <img class="w-10 h-10 rounded-full" 
        src="{{$user->image ? asset('storage/student/'.$user->image) : $def_profile}}"
        alt="{{$user->name}} image">
      <div class="pl-3">
          <div class="text-base font-semibold">{{$user->name}}</div>
          <div class="font-normal text-gray-500">{{$user->email}}</div>
      </div>  
  </th>
  <td class="px-6 py-4">
      {{$user->type}}
  </td>
  <td class="px-6 py-4">
      <div class="flex items-center">
        @if ($user->trusted == 1)
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 25 31.25" x="0px" y="0px" class="h-12">
            <g>
              <path d="M20.042,18.22632a.5.5,0,0,0-.4375-.28662,3.04932,3.04932,0,0,1-2.761-2.3346l.345.03577a.52784.52784,0,0,0,.40625-.14453.49852.49852,0,0,0,.14257-.40625l-.13574-1.2749,1.23047-.36231a.50013.50013,0,0,0,.29785-.71826l-.6123-1.125.99707-.80762a.49985.49985,0,0,0,0-.77734l-.998-.8086.61328-1.13476A.49887.49887,0,0,0,18.832,7.364l-1.23047-.3623.13574-1.27539a.49977.49977,0,0,0-.5498-.55029l-1.28613.13623-.36231-1.23047a.50042.50042,0,0,0-.71875-.29785l-1.123.61132-.8086-.99707a.51759.51759,0,0,0-.77734,0l-.8086.99707-1.123-.61132a.50042.50042,0,0,0-.71875.29785L9.09863,5.31226,7.8125,5.176a.49035.49035,0,0,0-.40625.14355.49651.49651,0,0,0-.14355.40674l.13574,1.27539L6.168,7.364a.49887.49887,0,0,0-.29785.71729L6.4834,9.21606l-.998.8086a.49985.49985,0,0,0,0,.77734l.99707.80762-.6123,1.125a.50013.50013,0,0,0,.29785.71826l1.23047.36231-.13574,1.2749a.49852.49852,0,0,0,.14257.40625.52428.52428,0,0,0,.40625.14453l1.28614-.13477.36328,1.2378a.498.498,0,0,0,.28906.32177.50722.50722,0,0,0,.43164-.02441l1.12207-.61768.08948.11017A10.63762,10.63762,0,0,1,8.5166,20.35132a10.92306,10.92306,0,0,0,.21875-1.147.5007.5007,0,0,0-.60156-.54737,3.05424,3.05424,0,0,1-1.37109.00733,3.83538,3.83538,0,0,0,1.80664-1.59375.5.5,0,0,0-.85157-.52442A2.70033,2.70033,0,0,1,5.39648,17.9397a.50019.50019,0,0,0-.38086.80713,3.08829,3.08829,0,0,0,2.61426.98584,11.94327,11.94327,0,0,1-.30371,1.16992.62844.62844,0,0,0,.35742.85156.48866.48866,0,0,0,.15528.02344c.94989-.00043,3.17151-2.19342,4.25958-4.37549l.01385.01709a.50032.50032,0,0,0,.7754,0l.01385-.01709c1.08826,2.18213,3.31061,4.37549,4.25958,4.37549a.48866.48866,0,0,0,.15528-.02344.62844.62844,0,0,0,.35742-.85156,11.94327,11.94327,0,0,1-.30371-1.16992,3.06107,3.06107,0,0,0,2.61426-.98584A.49975.49975,0,0,0,20.042,18.22632Zm-3.17578.43066a.5007.5007,0,0,0-.60156.54737,11.04747,11.04747,0,0,0,.21875,1.14746,10.63982,10.63982,0,0,1-2.87659-3.81806l.08948-.11017,1.12207.61768a.5.5,0,1,0,.48242-.876l-1.48926-.81982a.49968.49968,0,0,0-.63086.124L12.5,16.31226l-.68066-.84278a.49954.49954,0,0,0-.63086-.124l-.94336.51953-.30567-1.04248a.49623.49623,0,0,0-.53418-.35645l-1.083.11622.11523-1.07569a.5.5,0,0,0-.35547-.53271L7.04492,12.6687l.51465-.94678a.50006.50006,0,0,0-.125-.62744l-.84082-.68115.84082-.68115a.49862.49862,0,0,0,.125-.62647l-.5166-.957L8.082,7.843A.5.5,0,0,0,8.4375,7.3103L8.32227,6.2356l1.085.11474a.49428.49428,0,0,0,.53222-.35547l.30567-1.03662.94531.51465a.50275.50275,0,0,0,.62793-.12451L12.5,4.50708l.68164.84131a.49986.49986,0,0,0,.62793.12451l.94531-.51465.30567,1.03662a.49823.49823,0,0,0,.53222.35547l1.085-.11474L16.5625,7.3103A.5.5,0,0,0,16.918,7.843l1.03906.30566-.5166.957a.49862.49862,0,0,0,.125.62647l.84082.68115-.84082.68115a.50006.50006,0,0,0-.125.62744l.51465.94678-1.03711.30518a.5.5,0,0,0-.35547.53271l.11523,1.07569-.44628-.04639a.48522.48522,0,0,0-.07471.00787.47447.47447,0,0,0-.04834-.0025c-.01074.00159-.01892.00842-.02936.01068a.4939.4939,0,0,0-.1123.04077.48819.48819,0,0,0-.06391.034.49361.49361,0,0,0-.09173.08423.47131.47131,0,0,0-.03827.04522.4793.4793,0,0,0-.05707.12.48507.48507,0,0,0-.01752.05585.44683.44683,0,0,0-.01562.04968.47509.47509,0,0,0,.00866.09c.00092.01263-.00372.02423-.00183.03692.00232.01575.00775.035.01032.05109.00226.00867.00256.01752.00525.026a4.63847,4.63847,0,0,0,2.53619,3.4776A3.03548,3.03548,0,0,1,16.86621,18.657ZM12.5,14.95435A4.54417,4.54417,0,0,1,8.73242,7.86987a.49973.49973,0,1,1,.82813.55957,3.54059,3.54059,0,1,0,1.78418-1.37011.5.5,0,1,1-.32618-.94532A4.54425,4.54425,0,1,1,12.5,14.95435Zm-.74219-3.103-.80371-.92041a.5004.5004,0,0,1,.75391-.6582l.40722.46728,1.16114-1.4707a.50025.50025,0,0,1,.78515.62011l-1.53418,1.94288a.50167.50167,0,0,1-.37988.18994h-.01269A.50087.50087,0,0,1,11.75781,11.85132Z"/>
            </g>
          </svg>
        @endif
      </div>
  </td>
  <td class="px-6 py-4">
    <button 
        {{-- data-modal-target="authentication-modal" 
        data-modal-toggle="authentication-modal"  --}}
        x-on:click='open = !open, id="{{$user->id}}", name = "{{$user->name}}", email = "{{$user->email}}", type="{{$user->type}}", created_at="{{$user->created_at}}"'
        class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center" type="button">
        Edit User
    </button>
  </td>
</tr>