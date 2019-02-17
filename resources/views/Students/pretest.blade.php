@extends('layouts.app')

@section('content')
    <h2>{{$stu->firstName}} {{$stu->lastName}}</h2>
    <div class="">Students Pretest Information:</div>

        <hr>
            @foreach($pretest as $pretests)
            <table>
                <tr>
                    <td>How long have you been living in Jacksonville?</td>
                    <td>{{ $pretests->Q1 }} Year(s)</td>
                </tr>
                <tr>
                    <td>Are you attending school?</td>
                    <td>{{ $pretests->Q2 }}</td>
                </tr>
                <tr>
                    <td>How many siblings do you have?</td>
                    <td>{{ $pretests->Q3 }} Sibling(s)</td>
                </tr>
                <tr>
                    <td>How open are you about your feelings? 1=Not open at all, 5=Very open</td>
                    <td>{{ $pretests->Q4 }} </td>
                </tr>
                <tr>
                    <td>How positive do you feel about your future? 1=Not very positive, 5=Very positive</td>
                    <td>{{ $pretests->Q5 }} </td>
                </tr>
                <tr>
                    <td>I am not sure I can trust the adults in my life? 1=Strongly disagree, 5=Strongly agree</td>
                    <td>{{ $pretests->Q6 }} </td>
                </tr>
                <tr>
                    <td>I am not sure adults in my life trust me? 1=Strongly disagree, 5=Strongly agree</td>
                    <td>{{ $pretests->Q7 }} </td>
                </tr>
                <tr>
                    <td>How comfortable do you feel talking about your past? 1=Very uncomfortable, 5=Comfortable</td>
                    <td>{{ $pretests->Q8 }} </td>
                </tr>
                <tr>
                    <td>How likely are you to set goals for the next year? 1=Not likely at all, 5=Very likely</td>
                    <td>{{ $pretests->Q9 }} </td>
                </tr>
                <tr>
                    <td>I feel like I can put myself in others shoes? 1=No, 5=Yes</td>
                    <td>{{ $pretests->Q10 }} </td>
                </tr>
                <tr>
                    <td>I can understand other people's feelings/pain?</td>
                    <td>{{ $pretests->Q11 }} </td>
                </tr>
                <tr>
                    <td>My friends and I share the same values? 1=Strongly disagree, 5=Strongly </td>
                    <td>{{ $pretests->Q12 }} </td>
                </tr>
                <tr>
                    <td>I am happy with my friendships? 1=Strongly disagree, 5=Strongly agree</td>
                    <td>{{ $pretests->Q13 }} </td>
                </tr>
                <tr>
                    <td>I am good at forgiving others for small mistakes? 1=Strongly disagree, 5=Strongly agree</td>
                    <td>{{ $pretests->Q14 }} </td>
                </tr>
                <tr>
                    <td>I have at least one hobby that I enjoy? 1=Strongly disagree, 5=Strongly agree</td>
                    <td>{{ $pretests->Q15 }} </td>
                </tr>
                <tr>
                    <td>I am satisfied with the honest conversations I can have with those that are important to me? 1=Strongly disagree, 5=Strongly agree</td>
                    <td>{{ $pretests->Q16 }} </td>
                </tr>
                <tr>
                    <td>When I am emotional, I feel comfortable turning to someone I know for help 1=Strongly disagree, 5=Strongly agree</td>
                    <td>{{ $pretests->Q17 }} </td>
                </tr>
                <tr>
                    <td>I am part of a community that I can express myself in? 1=Strongly disagree, 5=Strongly agree</td>
                    <td>{{ $pretests->Q18 }} </td>
                </tr>
                <tr>
                    <td>I enjoy spending time with talented people 1=Strongly disagree, 5=Strongly agree</td>
                    <td>{{ $pretests->Q19 }} </td>
                </tr>
                <tr>
                    <td>How likely would you be to use an art form as a way of expressing life’s difficulties? 1=Not at all likely, 5=Extremely likely</td>
                    <td>{{ $pretests->Q20 }} </td>
                </tr>
            <table>

            <hr>
            <small>Created : {{$pretests->created_at}}</small>
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