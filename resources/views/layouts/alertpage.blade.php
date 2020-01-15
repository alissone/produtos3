        <div class="columns is-mobile is-centered">
            <div class="column is-half">
                <br/><br/><br/>
                <div class="has-text-centered is-size-3 notification is-danger">
                    <i class="icon fa3 fa3-big fa-exclamation-triangle"></i>
                    <h2>{{ $slot ?? '' }}</h2>
                </div>
                <h2 class="has-text-centered is-size-5">Clique <a href="{{ $link ?? '' }}" class="is-link">aqui</a> para fazer login</h2>
            </div>
        </div>

@extends('layouts.faicons')