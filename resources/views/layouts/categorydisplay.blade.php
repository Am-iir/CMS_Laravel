@for($j=0 ; $j<count($category['children_recursive'][$i]['children_recursive']);$j++)

    @if(!empty($category['children_recursive']))
        <ul>
            <li>
                <input type="checkbox"
                       value="{{$category['children_recursive'][$i]['children_recursive'][$j]['id']}}"
                       name="category_id[]">
                <label
                    for="category">{{$category['children_recursive'][$i]['children_recursive'][$j]['name']}}</label>
            </li>
        </ul>

    @endif
@endfor
