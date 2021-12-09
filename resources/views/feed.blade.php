<?xml version="1.0" encoding="UTF-8"?>
<rss version="2.0">
    <channel>
        <title>Laracasts-blog</title>
        <link>http://127.0.0.1:8000/feed</link>
        <description>Laracasts-blog</description>
        <language>en</language>
        <pubDate>{{ now() }}</pubDate>

        @foreach($posts as $post)
            <item>
                <title>$post->title</title>
                <link>{{ $post->slug }}</link>
                <description>{{ $post->body }}</description>
                <category>{{ $post->category->name }}</category>
                <author>{{ $post->author->name}} </author>
                <guid>{{ $post->id }}</guid>
                <pubDate>{{ $post->created_at->toRssString() }}</pubDate>
            </item>
        @endforeach
    </channel>
</rss>
