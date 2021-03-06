@extends('layouts.app')

@section('content')
    <section class="bg-light p-3">

            <div class='museums'>
                <h5 class='name'>{{ $museum->name }}</h5>
                <h5 class='place'>{{ $museum->placeName }}</h5>
                <h5 class='body'>{{ $museum->bodyName }}</h2>
                <p class='address'>{{ $museum->address }}</p>
                <p class='time'>{{ $museum->time }}</p>
                <p class='day'>{{ $museum->day }}</p>
                <p class='money'>{{ $museum->money }}</p>
                <p class='traffic'>{{ $museum->traffic }}</p>
                <p class='sns'>{{ $museum->sns }}</p>
                <p class='tel'>{{ $museum->tel }}</p>
                <p class='homepage'>{{ $museum->homepage }}</p>
                <p class='other'>{{ $museum->other }}</p>
                <p class='updated_at'>{{ $museum->updated_at }}</p>
            </div>
            
             @if(Auth::user()->id === 1)
            <form action="/museums/{{ $museum->id }}" id="form_{{ $museum->id }}" method="post" style="display:inline">
            @csrf
            @method('DELETE')
                <input type="submit" name="delete" class="btn btn-danger" value="削除" span onclick="return deleteMuseum(this);" >
            </form>
            @endif
            
            <button type="button" class="btn btn-info" onClick="history.back()">戻る</button>
            
        </section>    
        
 @endsection