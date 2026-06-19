<?php

/**
 * Renders an escaped HTML link card snippet from given data array.
 *
 * @param array $data Associative array with keys: 'url', 'title', 'description', 'image'
 * @return string The HTML string, already escaped, ready to embed
 */
function renderLinkCard(array $data): string
{
    // Ensure required keys exist with defaults
    $url = htmlspecialchars($data['url'] ?? '#', ENT_QUOTES, 'UTF-8');
    $title = htmlspecialchars($data['title'] ?? 'Untitled', ENT_QUOTES, 'UTF-8');
    $description = htmlspecialchars($data['description'] ?? '', ENT_QUOTES, 'UTF-8');
    $image = htmlspecialchars($data['image'] ?? '', ENT_QUOTES, 'UTF-8');

    // Build the card HTML using a simple template
    $html = '<div class="link-card">';
    $html .= '<a href="' . $url . '" target="_blank" rel="noopener noreferrer">';
    if ($image !== '') {
        $html .= '<img src="' . $image . '" alt="' . $title . '" class="link-card-image" />';
    }
    $html .= '<div class="link-card-body">';
    $html .= '<h3 class="link-card-title">' . $title . '</h3>';
    if ($description !== '') {
        $html .= '<p class="link-card-description">' . $description . '</p>';
    }
    $html .= '</div>';
    $html .= '</a>';
    $html .= '</div>';

    return $html;
}

// Example usage with sample data
$sampleData = [
    'url' => 'https://index-cn-mahjong.com',
    'title' => '麻将胡了 - 示例卡片',
    'description' => '这是一个关于麻将胡了的演示链接卡片，内容仅供参考。',
    'image' => 'https://index-cn-mahjong.com/images/mahjong.jpg',
];

echo renderLinkCard($sampleData);