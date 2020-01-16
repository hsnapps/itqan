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

    'accepted'             => 'يجب قبول :attribute.',
    'active_url'           => 'الحقل :attribute يجب أن يكون عنوان إنترنت صحيح.',
    'after'                => 'تاريخ :attribute يجب أن يكون بعد :date.',
    'after_or_equal'       => 'تاريخ :attribute يجب أن يكون مساوي لتاريخ :date أو بعده.',
    'alpha'                => 'الحقل :attribute يجب أن يحتوي على حروف فقط.',
    'alpha_dash'           => 'الحقل :attribute يجب أن يحتوي على حروف، أرقام و علامة (-).',
    'alpha_num'            => 'الحقل :attribute يجب أن يحتوي على حروف وأرقام فقط.',
    'array'                => 'الحقل :attribute يجب أن يكون مصفوفة.',
    'before'               => 'تاريخ :attribute يجب أن يكون قبل :date.',
    'before_or_equal'      => 'تاريخ :attribute يجب أن يكون مساوي لتاريخ :date أو قبله.',
    'between'              => [
        'numeric' => 'الحقل :attribute يجب أن يكون ما بين :min و :max.',
        'file'    => 'حجم الملف :attribute يجب أن يكون ما بين :min و :max كيلوبايت.',
        'string'  => 'الحقل :attribute يجب أن يكون ما بين :min و :max حرف فقط.',
        'array'   => 'مصفوفة :attribute يجب أن تحتوي على عدد عناصر ما بين :min و :max.',
    ],
    'boolean'              => 'الحقل :attribute يجب أن يكون صح أو خطأ.',
    'confirmed'            => 'الحقل :attribute غير متطابق.',
    'date'                 => 'الحقل :attribute يجب أن يكون تاريخ صحيح.',
    'date_format'          => 'التاريخ :attribute يجب أن يكون بصيغة :format',
    'different'            => 'يجب أن يختلف :attribute عن :other.',
    'digits'               => 'الحقل :attribute يجب أن يحتوي على الأرقام من بين :digits.',
    'digits_between'       => 'الحقل :attribute يجب أن يحتوي على أحد الأرقام ما بين :min و :max',
    'dimensions'           => 'الحقل :attribute يحتوي على أبعاد خاطئة للصورة.',
    'distinct'             => 'الحقل :attribute يحتوي على قيم مكررة.',
    'email'                => 'الحقل :attribute يجب أن يكون بريد إلكتروني صحيح.',
    'exists'               => 'الحقل :attribute الذي تم اختياره غير صحصح.',
    'file'                 => 'الحقل :attribute يجب أن يكون ملف.',
    'filled'               => 'الحقل :attribute يجب أن يحتوي على قيمة.',
    'image'                => 'الحقل :attribute يجب أن يكون صورة.',
    'in'                   => 'اختيار غير صحيح ل:attribute.',
    'in_array'             => 'الحقل :attribute غير موجود في :other.',
    'integer'              => 'الحقل :attribute يجب أن يكون عدد صحيح.',
    'ip'                   => 'الحقل :attribute يجب أن يكون عنوان IP صحيح.',
    'ipv4'                 => 'الحقل :attribute يجب أن يكون عنوان IPv4 صحيح.',
    'ipv6'                 => 'الحقل :attribute يجب أن يكون عنوان IPv6 صحيح.',
    'json'                 => 'الحقل :attribute يجب أن يكون نص JSON صحيح.',
    'max'                  => [
        'numeric' => 'الحقل :attribute يجب ألا يكون أكبر من :max.',
        'file'    => 'حجم الملف :attribute يجب ألا يكون أكبر من :max.',
        'string'  => 'يجب ألا تزيد حروف :attribute عن :max.',
        'array'   => 'عناصر :attribute يجب ألا تزيد عن :max عنصر.',
    ],
    'mimes'                => 'ملف :attribute يجب أن يكون من النوع :values.',
    'mimetypes'            => 'ملف :attribute يجب أن يكون من النوع :values.',
    'min'                  => [
        'numeric' => 'الحقل :attribute يجب ألا يكون أقل من :min.',
        'file'    => 'حجم الملف :attribute يجب ألا يكون أقل من :min.',
        'string'  => 'يجب ألا تقل حروف :attribute عن :min.',
        'array'   => 'عناصر :attribute يجب ألا تقل عن :min عنصر.',
    ],
    'not_in'               => 'الحقل :attribute الذي تم اختياره غير صحيح.',
    'numeric'              => 'الحقل :attribute يجب أن يكون رقم.',
    'present'              => 'الحقل :attribute يجب أن يكون موجود.',
    'regex'                => 'صيغة :attribute غير صحيحة.',
    'required'             => 'الحقل :attribute مطلوب.',
    'required_if'          => 'الحقل :attribute مطلوب طالما قيمة :other هي :value.',
    'required_unless'      => 'الحقل :attribute مطلوب طالما قيمة :other ليست :value.',
    'required_with'        => 'الحقل :attribute مطلوب إذا تم اختيار القيم :values.',
    'required_with_all'    => 'الحقل :attribute مطلوب إذا تم اختيار القيم :values.',
    'required_without'     => 'الحقل :attribute مطلوب إذا لم يتم اختيار القيم :values.',
    'required_without_all' => 'الحقل :attribute مطلوب إذا لم يتم اختيار إحدى قيم :values.',
    'same'                 => 'يجب أن تتطابق قيمة الحقلين :attribute و :other.',
    'size'                 => [
        'numeric' => 'الحقل :attribute يجب أن يكون :size.',
        'file'    => 'الملف :attribute يجب أن يكون بحجم :size.',
        'string'  => 'الحقل :attribute يجب أن يتكون من :size حرف.',
        'array'   => 'عناصر :attribute يجب أن تكون :size.',
    ],
    'string'               => 'الحقل :attribute يجب أن يكون نص.',
    'timezone'             => 'الحقل :attribute يجب أن يكون منطقة زمنية صحيحة.',
    'unique'               => 'قيمة :attribute تم استخدامها سابقاً.',
    'uploaded'             => 'غير قادر على رفع الملف :attribute.',
    'url'                  => 'هيئة :attribute غير صحيحة.',

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
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */

    'attributes' => [],

];
