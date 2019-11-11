#### 404异常处理
````
Laravel 中所有异常都是由 App\Exceptions\Handler 类处理。
打开此类文件，你可以发现 render 方法，render 方法负责将异常转换为 HTTP 响应。

这里把异常分为「 内置异常」和「自定义异常」两大类别来分别处理。



````