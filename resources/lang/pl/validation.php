<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Walidacyjne linie językowe
    |--------------------------------------------------------------------------
    |
    | Następujące wiersze językowe zawierają domyślne komunikaty o błędach używane przez klasę walidatora. 
    | Niektóre z tych reguł mają wiele wersji, na przykład reguły wielkości. 
    | Tutaj możesz ulepszyć każdą z tych wiadomości.
    |
    */

    'accepted' => ':attribute musi zostać zaakceptowany.',
    'active_url' => ':attribute nie jest prawidłowym adresem URL.',
    'after' => ':attribute musi być datą po :date.',
    'after_or_equal' => ':attribute musi być datą późniejszą lub tą samą co :date.',
    'alpha' => ':attribute może zawierać tylko litery.',
    'alpha_dash' => ':attribute może zawierać tylko litery, cyfry, myślniki i podkreślenia.',
    'alpha_num' => ':attribute może zawierać tylko litery i cyfry.',
    'array' => ':attribute musi być tablicą.',
    'before' => ':attribute musi być wcześniejszą datą niż :date.',
    'before_or_equal' => ':attribute attribute musi być datą wcześniejszą lub tą samą co :date.',
    'between' => [
        'numeric' => ':attribute musi być pomiędzy :min, a :max.',
        'file' => ':attribute musi być pomiędzy :min, a :max kilobajtów.',
        'string' => ':attribute musi być pomiędzy :min, a :max znaków.',
        'array' => ':attribute musi być pomiędzy :min, a :max elementów.',
    ],
    'boolean' => ':attribute pole musi mieć wartość true lub false.',
    'confirmed' => ':attribute potwierdzenie nie pasuje.',
    'date' => ':attribute nie jest prawidłową datą.',
    'date_equals' => ':attribute musi być tą samą datą co :date.',
    'date_format' => ':attribute nie pasuje do formatu :format.',
    'different' => ':attribute i :other muszę być różne.',
    'digits' => ':attribute musi być cyframi :digits.',
    'digits_between' => ':attribute musi być pomiędzy :min, a :max cyfr.',
    'dimensions' => ':attribute ma nieprawidłowe wymiary obrazu.',
    'distinct' => ':attribute pole ma zduplikowaną wartość.',
    'email' => ':attribute musi być prawidłowym adresem e-mail.',
    'ends_with' => ':attribute musi kończyć się jednym z poniższych: :values',
    'exists' => 'Wybrany :attribute jest nieważny.',
    'file' => ':attribute musi być plikiem.',
    'filled' => ':attribute pole musi mieć wartość.',
    'gt' => [
        'numeric' => ':attribute musi być większy niż :value.',
        'file' => ':attribute musi być większy niż :value kilobajtów.',
        'string' => 'The :attribute musi być większy niż :value znaków.',
        'array' => 'The :attribute musi być większy niż :value elementów.',
    ],
    'gte' => [
        'numeric' => ':attribute musi być większy lub równy :value.',
        'file' => ':attribute musi być większy lub równy :value kilobajtów.',
        'string' => ':attribute mmusi być większy lub równy :value znaków.',
        'array' => ':attribute musi mieć :value lub więcej elementów.',
    ],
    'image' => ':attribute musi być obrazem.',
    'in' => 'Wybrany :attribute jest nieważny.',
    'in_array' => ':attribute pole nie istnieje w :other.',
    'integer' => ':attribute musi być liczbą całkowitą.',
    'ip' => ':attribute musi być prawidłowym adresem IP.',
    'ipv4' => ':attribute musi być prawidłowym adresem IPv4.',
    'ipv6' => ':attribute musi być prawidłowym adresem IPv6.',
    'json' => ':attribute musi być prawidłowym łańcuchem JSON',
    'lt' => [
        'numeric' => ':attribute musi być mniejszy niż :value.',
        'file' => ':attribute musi być mniejszy niż :value kilobajtów.',
        'string' => ':attribute musi być mniejszy niż :value znaków.',
        'array' => ':attribute musi mieć mniej niż :value elementów.',
    ],
    'lte' => [
        'numeric' => ':attribute musi być mniejszy lub równy :value.',
        'file' => ':attribute musi być mniejszy lub równy :value kilobajtów.',
        'string' => ':attribute musi być mniejszy lub równy :value znaków.',
        'array' => ':attribute nie może mieć więcej niż :value elementów.',
    ],
    'max' => [
        'numeric' => ':attribute nie może być większy niż :max.',
        'file' => ':attribute nie może być większy niż :max kilobajtów.',
        'string' => ':attribute nie może być większy niż :max znaków.',
        'array' => ':attribute nie może mieć więcej niż :max elementów.',
    ],
    'mimes' => ':attribute must be a file of type: :values.',
    'mimetypes' => ':attribute must be a file of type: :values.',
    'min' => [
        'numeric' => 'Pole :attribute musi być przynajmniej :min.',
        'file' => 'Pole :attribute musi mieć przynajmniej :min kilobajtów.',
        'string' => 'Pole :attribute musi mieć przynajmniej :min znaków.',
        'array' => 'Pole :attribute musi mieć przynajmniej :min elementów.',
    ],
    'not_in' => 'Wybrany :attribute jest nieważny.',
    'not_regex' => 'Format :attribute jest nieprawidłowy.',
    'numeric' => ':attribute musi być liczbą.',
    'password' => 'Hasło jest nieprawidłowe.',
    'present' => ':attribute pole musi być obecne.',
    'regex' => 'Format :attribute jest nieprawidłowy.',
    'required' => 'Pole :attribute jest wymagane.',
    'required_if' => 'Pole :attribute jest wymagane, gdy :other jest :value.',
    'required_unless' => 'Pole :attribute jest wymagane, chyba że :other jest w :values.',
    'required_with' => 'Pole :attribute jest wymagane, gdy :values jest obecne.',
    'required_with_all' => 'Pole :attribute jest wymagane, gdy :values są obecne.',
    'required_without' => 'Pole :attribute jest wymagane, gdy :values nie jest obecne.',
    'required_without_all' => 'Pole :attribute jest wymagane, gdy żadne z :values nie są obecne.',
    'same' => ':attribute i :other muszą pasować.',
    'size' => [
        'numeric' => ':attribute musi wynosić :size.',
        'file' => ':attribute musi wynosić :size kilobajtów.',
        'string' => ':attribute musi wynosić :size znaków.',
        'array' => ':attribute musi zawierać :size elementów.',
    ],
    'starts_with' => ':attribute musi zaczynać się od jednego z poniższych: :values',
    'string' => ':attribute musi być ciągiem.',
    'timezone' => ':attribute musi być prawidłową strefą.',
    'unique' => 'Adres :attribute został już użyty.',
    'uploaded' => 'Nie udało się przesłać :attribute.',
    'url' => 'Format :attribute jest nieprawidłowy.',
    'uuid' => ':attribute musi być prawidłowym UUID.',

    /*
    |--------------------------------------------------------------------------
    | Niestandardowe linie językowe walidacji
    |--------------------------------------------------------------------------
    |
    | W tym miejscu możesz określić niestandardowe komunikaty sprawdzania poprawności dla atrybutów,  
    | używając konwencji „attribute.rule” do nazwania linii.
    | Dzięki temu można szybko określić konkretną linię niestandardowego języka dla danej reguły atrybutu.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Niestandardowe atrybuty walidacji
    |--------------------------------------------------------------------------
    |
    | Następujące linie językowe służą do zamiany naszego symbolu zastępczego atrybutu na coś bardziej przyjaznego dla czytelnika, 
    | takiego jak „Adres e-mail” zamiast „e-mail”. To po prostu pomaga nam uczynić nasze przesłanie bardziej wyrazistym.
    | przyjaznego dla czytelnika, 
    |
    */

    'attributes' => [],

];
