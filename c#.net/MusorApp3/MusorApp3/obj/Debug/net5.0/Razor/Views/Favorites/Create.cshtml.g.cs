#pragma checksum "C:\Users\Soma\source\repos\MusorApp3\MusorApp3\Views\Favorites\Create.cshtml" "{ff1816ec-aa5e-4d10-87f7-6f4963833460}" "99bc05cc8630780fef111f455f8915d230a7851f"
// <auto-generated/>
#pragma warning disable 1591
[assembly: global::Microsoft.AspNetCore.Razor.Hosting.RazorCompiledItemAttribute(typeof(AspNetCore.Views_Favorites_Create), @"mvc.1.0.view", @"/Views/Favorites/Create.cshtml")]
namespace AspNetCore
{
    #line hidden
    using System;
    using System.Collections.Generic;
    using System.Linq;
    using System.Threading.Tasks;
    using Microsoft.AspNetCore.Mvc;
    using Microsoft.AspNetCore.Mvc.Rendering;
    using Microsoft.AspNetCore.Mvc.ViewFeatures;
#nullable restore
#line 1 "C:\Users\Soma\source\repos\MusorApp3\MusorApp3\Views\_ViewImports.cshtml"
using MusorApp3;

#line default
#line hidden
#nullable disable
#nullable restore
#line 2 "C:\Users\Soma\source\repos\MusorApp3\MusorApp3\Views\_ViewImports.cshtml"
using MusorApp3.Models;

#line default
#line hidden
#nullable disable
    [global::Microsoft.AspNetCore.Razor.Hosting.RazorSourceChecksumAttribute(@"SHA1", @"99bc05cc8630780fef111f455f8915d230a7851f", @"/Views/Favorites/Create.cshtml")]
    [global::Microsoft.AspNetCore.Razor.Hosting.RazorSourceChecksumAttribute(@"SHA1", @"785bb92381456e28c6e1490534642bc4ac79e7c8", @"/Views/_ViewImports.cshtml")]
    public class Views_Favorites_Create : global::Microsoft.AspNetCore.Mvc.Razor.RazorPage<UserFavourite>
    {
        #pragma warning disable 1998
        public async override global::System.Threading.Tasks.Task ExecuteAsync()
        {
            WriteLiteral("\r\n");
#nullable restore
#line 3 "C:\Users\Soma\source\repos\MusorApp3\MusorApp3\Views\Favorites\Create.cshtml"
  
    ViewBag.Title = "Kedvenc hozzáadás";

#line default
#line hidden
#nullable disable
            WriteLiteral("\r\n");
#nullable restore
#line 7 "C:\Users\Soma\source\repos\MusorApp3\MusorApp3\Views\Favorites\Create.cshtml"
 using (Html.BeginForm("AddFavourite", "Favorites", FormMethod.Post))
{
    

#line default
#line hidden
#nullable disable
#nullable restore
#line 9 "C:\Users\Soma\source\repos\MusorApp3\MusorApp3\Views\Favorites\Create.cshtml"
Write(Html.Hidden("channelId", Model.ChannelId));

#line default
#line hidden
#nullable disable
#nullable restore
#line 10 "C:\Users\Soma\source\repos\MusorApp3\MusorApp3\Views\Favorites\Create.cshtml"
Write(Html.Hidden("userId", Model.UserId));

#line default
#line hidden
#nullable disable
#nullable restore
#line 11 "C:\Users\Soma\source\repos\MusorApp3\MusorApp3\Views\Favorites\Create.cshtml"
Write(Html.TextBoxFor(d => d.Name));

#line default
#line hidden
#nullable disable
            WriteLiteral("    <button type=\"submit\">Nézzük</button>\r\n");
#nullable restore
#line 13 "C:\Users\Soma\source\repos\MusorApp3\MusorApp3\Views\Favorites\Create.cshtml"
}

#line default
#line hidden
#nullable disable
            WriteLiteral("  ");
        }
        #pragma warning restore 1998
        [global::Microsoft.AspNetCore.Mvc.Razor.Internal.RazorInjectAttribute]
        public global::Microsoft.AspNetCore.Mvc.ViewFeatures.IModelExpressionProvider ModelExpressionProvider { get; private set; }
        [global::Microsoft.AspNetCore.Mvc.Razor.Internal.RazorInjectAttribute]
        public global::Microsoft.AspNetCore.Mvc.IUrlHelper Url { get; private set; }
        [global::Microsoft.AspNetCore.Mvc.Razor.Internal.RazorInjectAttribute]
        public global::Microsoft.AspNetCore.Mvc.IViewComponentHelper Component { get; private set; }
        [global::Microsoft.AspNetCore.Mvc.Razor.Internal.RazorInjectAttribute]
        public global::Microsoft.AspNetCore.Mvc.Rendering.IJsonHelper Json { get; private set; }
        [global::Microsoft.AspNetCore.Mvc.Razor.Internal.RazorInjectAttribute]
        public global::Microsoft.AspNetCore.Mvc.Rendering.IHtmlHelper<UserFavourite> Html { get; private set; }
    }
}
#pragma warning restore 1591
