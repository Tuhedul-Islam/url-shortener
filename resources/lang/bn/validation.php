<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted' => ':attribute টি অবশ্যই গ্রহণ করতে হবে।',
    'active_url' => ':attribute টি কোনও বৈধ ইউআরএল নয়।',
    'after' => ':attribute টি অবশ্যই তারিখের পরে হওয়া উচিত।',
    'alpha' => ':attribute এ কেবল অক্ষর থাকতে পারে।',
    'alpha_dash' => ':attribute এ কেবল অক্ষর, সংখ্যা, ড্যাশ এবং আন্ডারস্কোর থাকতে পারে।',
    'alpha_num' => ':attribute এ কেবল অক্ষর এবং সংখ্যা থাকতে পারে।',
    'array' => ':attribute টি অবশ্যই একটি শ্রেণীবিন্যাস হতে হবে।',
    'before' => ':attribute টি অবশ্যই তারিখ :date এর আগে হতে হবে।',
    'before_or_equal' => 'এই :attribute টি অবশ্যই তারিখ এর পূর্বে বা :date এর সমান হতে হবে।',
    'between' => [
        'numeric' => 'এই :attribute টি অবশ্যই :min এবং :max এর মধ্যে হতে হবে।',
        'file' => 'এই :attribute টি অবশ্যই :min এবং :max কিলোবাইট এর মধ্যে হতে হবে।',
        'string' => 'এই :attribute টি অবশ্যই :min এবং :max অক্ষর এর মধ্যে হতে হবে।',
        'array' => 'এই :attribute টি অবশ্যই :min এবং :max পদ এর মধ্যে হতে হবে।',
    ],
    'boolean' => ':attribute টি অবশ্যই সত্য বা মিথ্যা হতে হবে।',
    'confirmed' => ':attribute এর নিশ্চিতকরণ মিলছে না।',
    'date' => 'এই :attribute টি কোনও বৈধ তারিখ নয়।',
    'date_equals' => ':attribute টি তারিখ বা তারিখের সমান হতে হবে।',
    'date_format' => ':attribute টির পদ্ধতি মিলছে না।',


    'different' => ':attribute এবং :other টি অবশ্যই আলাদা হতে হবে।',
    'digits' => ':attribute টি অবশ্যই :digits সংখ্যা হবে।',
    'digits_between' => 'এই :attribute টি অবশ্যই :min এবং :max সংখ্যার মধ্যে হতে হবে।',
    'dimensions' => 'এই :attribute এ চিত্রটির মাত্রা অবৈধ রয়েছে।',
    'distinct' => 'এই :attribute ক্ষেত্রটির একটি সদৃশ মান রয়েছে।',
    'email' => 'এই :attribute টির একটি বৈধ ইমেইল ঠিকানা আবশ্যক।',
    'ends_with' => 'এই :attribute টি নিম্নলিখিত : :values এর মধ্যে একটির সাথে অবশ্যই শেষ হওয়া উচিত।',
    'exists' => 'এই নির্বাচিত :attribute টি সঠিক নয়।',
    'file' => 'এই :attribute টি অবশ্যই একটি নথি হতে হবে।',
    'filled' => 'এই :attribute ক্ষেত্রের অবশ্যই একটি মান থাকতে হবে।',
    'gt' => [
        'numeric' => 'এই :attribute টি :value এর চেয়ে বড় হওয়া আবশ্যক।',
        'file' => 'এই :attribute টি কিলোবাইট :value এর চেয়ে বড় হওয়া আবশ্যক।',
        'string' => 'এই :attribute টি অক্ষর :value এর চেয়ে বড় হওয়া আবশ্যক।',
        'array' => 'এই :attribute টি আইটেমের মান এর চেয়ে বেশি থাকতে হবে।',
    ],
    'gte' => [
        'numeric' => 'এই :attribute টি অবশ্যই বৃহত্তর বা সমান :value এর হতে হবে।',
        'file' => 'এই :attribute টি অবশ্যই বৃহত্তর বা সমান কিলোবাইট এর :value হতে হবে।',
        'string' => 'এই :attribute টি অবশ্যই বৃহত্তর বা সমান অক্ষর এর :value হতে হবে।',
        'array' => 'এই :attribute টি অবশ্যই :value পদ বা আরও কিছু থাকতে হবে।',
    ],
    'image' => 'এই :attribute টি অবশ্যই একটি চিত্র হতে হবে।',
    'in' => 'এই নির্বাচিত :attribute টি বৈধ নয়।',
    'in_array' => 'এই :attribute ক্ষেত্রটি :other এ নেই।',
    'integer' => 'এই :attribute টি অবশ্যই একটি পূর্ণসংখ্যা হতে হবে।',
    'ip' => 'এই :attribute টি অবশ্যই একটি বৈধ আইপি ঠিকানা হতে হবে।',
    'ipv4' => 'এই :attribute টি অবশ্যই একটি বৈধ IPv4 ঠিকানা হতে হবে।',
    'ipv6' => 'এই :attribute টি অবশ্যই একটি বৈধ IPv6 ঠিকানা হতে হবে।',
    'json' => 'এই :attribute টি অবশ্যই একটি বৈধ JSON স্ট্রিং হওয়া উচিত।',
    'lt' => [
        'numeric' => 'এই :attribute টি :value থেকে কম হওয়া উচিত।',
        'file' => 'এই :attribute টি অবশ্যই কিলোবাইট :value থেকে কম হওয়া আবশ্যক।',
        'string' => 'এই :attribute টি অবশ্যই অক্ষর :value থেকে কম হওয়া আবশ্যক।',
        'array' => 'এই :attribute টি আইটেমের :value থেকে কম থাকতে হবে।',
    ],
    'lte' => [
        'numeric' => 'এই :attribute টি অবশ্যই ক্ষুদ্রতর বা সমান :value এর হতে হবে।',
        'file' => 'এই :attribute টি অবশ্যই ক্ষুদ্রতর বা সমান কিলোবাইট এর :value হতে হবে।',
        'string' => 'এই :attribute টি অবশ্যই ক্ষুদ্রতর বা সমান অক্ষর এর :value হতে হবে।',
        'array' => 'এই :attribute টি আইটেমের :value এর চেয়ে বেশি হওয়া উচিত নয়।',
    ],
    'max' => [
        'numeric' => 'এই :attribute টি :max এর চেয়ে বড় নাও হতে পারে।',
        'file' => 'এই :attribute টি :max কিলোবাইট এর চেয়ে বড় নাও হতে পারে।',
        'string' => 'এই :attribute টি :max অক্ষর এর চেয়ে বড় নাও হতে পারে।',
        'array' => 'এই :attribute টি :max আইটেমের এর চেয়ে বড় নাও হতে পারে।',
    ],
    'mimes' => 'এই :attribute টি অবশ্যই একটি নথি প্রকার: :values হতে হবে।',
    'mimetypes' => 'এই :attribute টি অবশ্যই একটি নথি প্রকার: :values হতে হবে।',
    'min' => [
        'numeric' => 'এই :attribute টি অবশ্যই :min হতে হবে।',
        'file' => 'এই :attribute টি অবশ্যই :min কিলোবাইট এর হতে হবে।',
        'string' => 'এই :attribute টি অবশ্যই :min অক্ষর এর হতে হবে।',
        'array' => 'এই :attribute টি অবশ্যই :min আইটেমের এর হতে হবে।',
    ],
    'not_in' => 'এই নির্বাচিত :attribute টি বৈধ নয়।',
    'not_regex' => ':attribute এর পদ্ধতি টি বৈধ নয়।',
    'numeric' => ':attribute টি অবশ্যই একটি সংখ্যা হতে হবে।',
    'password' => 'এই পাসওয়ার্ড টি ভুল।',
    'present' => ':attribute ক্ষেত্রটি অবশ্যই উপস্থিত থাকতে হবে।',
    'regex' => ':attribute এর পদ্ধতি টি বৈধ নয়।',
    'required' => ' :attribute ক্ষেত্রটি পূরণ করতে হবে।',
    'required_if' => 'এই :attribute ক্ষেত্রটি অপরিহার্য যখন :other :value হয়।',
    'required_unless' => 'এই :attribute ক্ষেত্রটি অপরিহার্য :other :values না হওয়া পর্যন্ত।',
    'required_with' => 'এই :attribute ক্ষেত্রটি অপরিহার্য যখন :values উপস্থিত থাকে।',
    'required_with_all' => 'এই :attribute ক্ষেত্রটি অপরিহার্য যখন :values উপস্থিত থাকে।',
    'required_without' => 'এই :attribute ক্ষেত্রটি অপরিহার্য যখন :values উপস্থিত থাকে না।',
    'required_without_all' => 'এই :attribute ক্ষেত্রটি অপরিহার্য যখন কোনো :values উপস্থিত থাকে না।',
    'same' => 'এই :attribute এবং :other অবশ্যই সদৃশ হতে হবে।',
    'size' => [
        'numeric' => 'এই :attribute অবশ্যই :size হবে।',
        'file' => 'এই :attribute অবশ্যই কিলোবাইট :size হবে।',
        'string' => 'এই :attribute অবশ্যই অক্ষর :size হবে।',
        'array' => ':attribute টি অবশ্যই পদ :size এর অন্তর্ভুক্ত থাকতে হবে।',
    ],
    'starts_with' => ':attribute নিম্নলিখিত : :values এর একটি দিয়ে শুরু করতে হবে।',
    'string' => ':attribute টি অবশ্যই একটি স্ট্রিং হতে হবে।',
    'timezone' => ':attribute অবশ্যই একটি বৈধ অঞ্চল হতে হবে।',
    'unique' => ':attribute টি ইতিমধ্যে নেওয়া হয়েছে।',
    'uploaded' => ':attribute টি আপলোড করতে ব্যর্থ হয়েছে।',
    'url' => ':attribute এর পদ্ধতি টি বৈধ নয়।',
    'uuid' => ':attribute টি অবশ্যই একটি বৈধ হতে হবে।',
    'validation_error' => 'বিধিসম্মত নয়',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [

    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [
        'name' => 'ইংরেজি',
        'name_bn' => 'বাংলা',
        'office_type'=>'ইংরেজি',
        'office_type_bn'=>'বাংলা',
        'office_category' => 'ইংরেজি',
        'office_category_bn' => 'বাংলা',
        'status'=>'স্ট্যাটাস',
        'memo_no' => 'মেমো নং',
        'memo_date' => 'মেমো তারিখ',
        'issue_no' => 'ইস্যু নং',
        'promotion_date' => 'প্রমোশন তারিখ',
        'posting_type_id' => 'পোস্টিং টাইপ',
        'pay_grade_id' => 'বেতন গ্রেড',
        'pay_scale' => 'বেতন কাঠামো',
        'basic_pay' => 'মূল বেতন',
        'promotiondetails' => 'পোস্টিং বিস্তারিত',
        'forwarded_to' => 'কাকে  ফরওয়ার্ড ',
        'note_promotion' => 'প্রমোশন মন্তব্য',
        'office_id' => 'অফিস',
        'district_id' => 'জেলা',
        "division_id" => 'বিভাগ',
        'upazila_id' => 'উপজেলা',
        'rank' => 'পদ',
        'head_office_department_id' => 'প্রধান অফিস ডিপার্টমেন্ট',
        'head_office_section_id' => 'প্রধান অফিস বিভাগ',
        'head_office_sub_section_id' => 'প্রধান কার্যালয়ের উপ বিভাগ',
        'office_type_id'=>'অফিস টাইপ নির্বাচন করুন',

        'office_name' => 'ইংরেজি',
        'office_name_bn' => 'বাংলা',
        'disability_type' => 'ইংরেজি',
        'disability_type_bn' => 'বাংলা',
        'disability_degree' => 'ইংরেজি',
        'disability_degree_bn' => 'বাংলা',
        'pf_type_name' => 'ইংরেজি',
        'pf_type_name_bn' => 'বাংলা',

        'code' => 'কোড',
        'loan_type_name' => 'ইংরেজি',
        'loan_type_name_bn' => 'বাংলা',
    ],


];
