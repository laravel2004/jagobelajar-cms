<?php

return [
    'irt_quiz' => [
        'base_url' => env('IRT_QUIZ_BASE_URL', 'http://127.0.0.1:8001'),
        'exam_sessions_endpoint' => env('IRT_QUIZ_EXAM_SESSIONS_ENDPOINT', 'http://127.0.0.1:8001/api/public/exam-sessions'),
        'exam_session_register_endpoint' => env('IRT_QUIZ_EXAM_SESSION_REGISTER_ENDPOINT', 'http://127.0.0.1:8001/api/public/exam-sessions'),
        'premium_register_endpoint' => env('IRT_QUIZ_PREMIUM_REGISTER_ENDPOINT', 'http://127.0.0.1:8001/api/public/exam-sessions'),
    ],
    'midtrans' => [
        'server_key' => env('MIDTRANS_SERVER_KEY'),
        'client_key' => env('MIDTRANS_CLIENT_KEY'),
        'is_production' => env('MIDTRANS_IS_PRODUCTION', false),
        'is_sanitized' => env('MIDTRANS_IS_SANITIZED', true),
        'is_3ds' => env('MIDTRANS_IS_3DS', true),
    ],
];
