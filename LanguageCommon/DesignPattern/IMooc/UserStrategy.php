<?php
namespace IMooc;

/**
 * 策略模式
 * 将一组特定的行为和算法封装成类，以适应某些特定的上下文环境
 */
interface UserStrategy {
    function showAd();
    function showCategory();
}