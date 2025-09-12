<?php

use App\Models\Tweet;
use App\Models\User;

/*
it('has tweet page', function () {
    $response = $this->get('/tweet');

    $response->assertStatus(200);
});
*/

// 🔽一覧取得のテスト
it('displays tweets', function () {
    // ユーザを作成
    $user = User::factory()->create();

    // ユーザを認証
    $this->actingAs($user);

    // Tweetを作成
    $tweet = Tweet::factory()->create();

    // GETリクエスト
    $response = $this->get('/tweets');

    // レスポンスにTweetの内容と投稿者名が含まれていることを確認
    $response->assertStatus(200);
    $response->assertSee($tweet->tweet);
    $response->assertSee($tweet->user->name);
});
