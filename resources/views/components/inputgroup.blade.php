<div>
    <label for="ig-{{$value}}" class="block mb-2 text-sm font-medium text-gray-900">{{ucfirst($value)}} Student:</label>
    <input x-model="{{$value}}" type="text" name="{{$value}}" id="ig-{{$value}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="name@company.com" required>
</div>