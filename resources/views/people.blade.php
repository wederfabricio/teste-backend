<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                margin: 0;
            }


            .content {
                text-align: center;
            }

            table {
                margin: auto;
                border-collapse: collapse;
            }
            
            td {
                padding: 0.2em;
                border: 1px solid #ccc;
            }
        </style>
    </head>
    <body>
        <div>
            <table>
                <thead>
                    <tr>
                        <td>Nome do Personagem</td>
                        <td>Idade do Personagem</td>
                        <td width="20%">Título do Filme</td>
                        <td width="20%">Ano de Lançamento do Filme</td>
                        <td width="20%">Pontuação Rotten Tomato</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $person)
                    <tr>

                        <td>{{ $person->name }}</td>
                        <td>{{ $person->age }}</td>
                        <td colspan="3">
                            @foreach($person->films as $film)
                            <table width="100%">
                                <tr>
                                    <td width="33.3%">{{ $film->title }}</td>
                                    <td width="33.3%">{{ $film->release_date }}</td>
                                    <td width="33.3%">{{ $film->rt_score }}</td>
                                </tr>
                            </table>
                            @endforeach
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </body>
</html>
