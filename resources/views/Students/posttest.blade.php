@extends('layouts.app')

@section('content')
    <h2>{{$stu->firstName}} {{$stu->lastName}}</h2>
    <div class="">Students Posttest Information:</div>

        <hr>
            @foreach($posttest as $posttests)
            <table>
                <tr>
                    <td>How open are you about your feelings? 1=Not open at all, 5=Very open</td>
                    <td>{{ $posttests->Q1 }}</td>
                </tr>
                <tr>
                    <td>How positive do you feel about your future? 1=Not very positive, 5=Very positive</td>
                    <td>{{ $posttests->Q2 }}</td>
                </tr>
                <tr>
                    <td>I am not sure I can trust the adults in my life? 1=Strongly disagree, 5=Strongly agree</td>
                    <td>{{ $posttests->Q3 }} </td>
                </tr>
                <tr>
                    <td>I am not sure adults in my life trust me? 1=Strongly disagree, 5=Strongly agree</td>
                    <td>{{ $posttests->Q4 }} </td>
                </tr>
                <tr>
                    <td>How comfortable do you feel talking about your past? 1=Very uncomfortable, 5=Comfortable</td>
                    <td>{{ $posttests->Q5 }} </td>
                </tr>
                <tr>
                    <td>How likely are you to set goals for the next year? 1=Not likely at all, 5=Very likely</td>
                    <td>{{ $posttests->Q6 }} </td>
                </tr>
                <tr>
                    <td>I feel like I can put myself in others shoes? 1=No, 5=Yes</td>
                    <td>{{ $posttests->Q7 }} </td>
                </tr>
                <tr>
                    <td>I can understand other people\'s feelings/pain?</td>
                    <td>{{ $posttests->Q8 }} </td>
                </tr>
                <tr>
                    <td>My friends and I share the same values? 1=Strongly disagree, 5=Strongly agree</td>
                    <td>{{ $posttests->Q9 }} </td>
                </tr>
                <tr>
                    <td>I am happy with my friendships? 1=Strongly disagree, 5=Strongly agree</td>
                    <td>{{ $posttests->Q10 }} </td>
                </tr>
                <tr>
                    <td>I am good at forgiving others for small mistakes? 1=Strongly disagree, 5=Strongly agree</td>
                    <td>{{ $posttests->Q11 }} </td>
                </tr>
                <tr>
                    <td>I have at least one hobby that I enjoy? 1=Strongly disagree, 5=Strongly agree</td>
                    <td>{{ $posttests->Q12 }} </td>
                </tr>
                <tr>
                    <td>I am satisfied with the honest conversations I can have with those that are important to me? 1=Strongly disagree, 5=Strongly agree</td>
                    <td>{{ $posttests->Q13 }} </td>
                </tr>
                <tr>
                    <td>When I am emotional, I feel comfortable turning to someone I know for help 1=Strongly disagree, 5=Strongly agree</td>
                    <td>{{ $posttests->Q14 }} </td>
                </tr>
                <tr>
                    <td>I am part of a community that I can express myself in? 1=Strongly disagree, 5=Strongly agree</td>
                    <td>{{ $posttests->Q15 }} </td>
                </tr>
                <tr>
                    <td>I enjoy spending time with talented people 1=Strongly disagree, 5=Strongly agree</td>
                    <td>{{ $posttests->Q16 }} </td>
                </tr>
                <tr>
                    <td>As a result of this program, I can: Better express my feelings 1=Strongly disagree, 5=Strongly agree</td>
                    <td>{{ $posttests->Q17 }} </td>
                </tr>
                <tr>
                    <td>As a result of this program, I can: More comfortably talk about my past 1=Strongly disagree, 5=Strongly agree</td>
                    <td>{{ $posttests->Q18 }} </td>
                </tr>
                <tr>
                    <td>As a result of this program, I can: Trust others more 1=Strongly disagree, 5=Strongly agree</td>
                    <td>{{ $posttests->Q19 }} </td>
                </tr>
                <tr>
                    <td>As a result of this program, I can: Better develop friendships 1=Strongly disagree, 5=Strongly agree</td>
                    <td>{{ $posttests->Q20 }} </td>
                </tr>
                <tr>
                    <td>As a result of this program, I can: Use art as a tool to express my feelings 1=Strongly disagree, 5=Strongly agree</td>
                    <td>{{ $posttests->Q21 }} </td>
                </tr>
                <tr>
                    <td>As a result of this program, I can: Better express my feelings 1=Strongly disagree, 5=Strongly agree</td>
                    <td>{{ $posttests->Q22 }} </td>
                </tr>
                <tr>
                    <td>As a result of this program, I can: More comfortably talk about my past 1=Strongly disagree, 5=Strongly agree</td>
                    <td>{{ $posttests->Q23 }} </td>
                </tr>
                <tr>
                    <td>As a result of this program, I can: Trust others more 1=Strongly disagree, 5=Strongly agree</td>
                    <td>{{ $posttests->Q24 }} </td>
                </tr>
                <tr>
                    <td>As a result of this program, I can: Better develop friendships 1=Strongly disagree, 5=Strongly agree</td>
                    <td>{{ $posttests->Q25 }} </td>
                </tr>
                <tr>
                    <td>As a result of this program, I can: Use art as a tool to express my feelings 1=Strongly disagree, 5=Strongly agree</td>
                    <td>{{ $posttests->Q26 }} </td>
                </tr>
                <tr>
                    <td>What other benefits have you gained from this program?</td>
                    <td>{{ $posttests->Q27 }} </td>
                </tr>
            <table>

            <hr>
            <small>Created : {{$posttests->created_at}}</small>
            @endforeach
        
        <div class="text-right">
            <a href="{{ URL::previous() }}" class="btn btn-primary" role="button" aria-pressed="true">Back</a>
        </div>

<style>
    table tr td
    {
        padding: 10px;
        margin: 5px;
        border-bottom: 1px solid #ccc;
    }
</style>
@endsection