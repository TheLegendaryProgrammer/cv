#pragma checksum "C:\Users\Soma\source\repos\MusorApp3\MusorApp3\Views\Login\Login.cshtml" "{ff1816ec-aa5e-4d10-87f7-6f4963833460}" "d6fc32de4762ae00f22eeb97a683653f9b8d237d"
// <auto-generated/>
#pragma warning disable 1591
[assembly: global::Microsoft.AspNetCore.Razor.Hosting.RazorCompiledItemAttribute(typeof(AspNetCore.Views_Login_Login), @"mvc.1.0.view", @"/Views/Login/Login.cshtml")]
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
    [global::Microsoft.AspNetCore.Razor.Hosting.RazorSourceChecksumAttribute(@"SHA1", @"d6fc32de4762ae00f22eeb97a683653f9b8d237d", @"/Views/Login/Login.cshtml")]
    [global::Microsoft.AspNetCore.Razor.Hosting.RazorSourceChecksumAttribute(@"SHA1", @"785bb92381456e28c6e1490534642bc4ac79e7c8", @"/Views/_ViewImports.cshtml")]
    public class Views_Login_Login : global::Microsoft.AspNetCore.Mvc.Razor.RazorPage<MusorApp3.Models.User>
    {
        #pragma warning disable 1998
        public async override global::System.Threading.Tasks.Task ExecuteAsync()
        {
            WriteLiteral("\r\n");
#nullable restore
#line 3 "C:\Users\Soma\source\repos\MusorApp3\MusorApp3\Views\Login\Login.cshtml"
  
    ViewBag.Title = "Login";

#line default
#line hidden
#nullable disable
            WriteLiteral("\r\n");
#nullable restore
#line 7 "C:\Users\Soma\source\repos\MusorApp3\MusorApp3\Views\Login\Login.cshtml"
 using (Html.BeginForm("Login", "Login", FormMethod.Post))
{

#line default
#line hidden
#nullable disable
            WriteLiteral("    <fieldset>\r\n        <legend>Musor app Login Page</legend>\r\n\r\n        ");
#nullable restore
#line 12 "C:\Users\Soma\source\repos\MusorApp3\MusorApp3\Views\Login\Login.cshtml"
   Write(Html.AntiForgeryToken());

#line default
#line hidden
#nullable disable
            WriteLiteral("\r\n        ");
#nullable restore
#line 13 "C:\Users\Soma\source\repos\MusorApp3\MusorApp3\Views\Login\Login.cshtml"
   Write(Html.ValidationSummary(true));

#line default
#line hidden
#nullable disable
            WriteLiteral("\r\n");
#nullable restore
#line 14 "C:\Users\Soma\source\repos\MusorApp3\MusorApp3\Views\Login\Login.cshtml"
         if (@ViewBag.Message != null)
        {

#line default
#line hidden
#nullable disable
            WriteLiteral("            <div style=\"border: 1px solid red\">\r\n                ");
#nullable restore
#line 17 "C:\Users\Soma\source\repos\MusorApp3\MusorApp3\Views\Login\Login.cshtml"
           Write(ViewBag.Message);

#line default
#line hidden
#nullable disable
            WriteLiteral("\r\n            </div>\r\n");
#nullable restore
#line 19 "C:\Users\Soma\source\repos\MusorApp3\MusorApp3\Views\Login\Login.cshtml"
        }

#line default
#line hidden
#nullable disable
            WriteLiteral("        <table>\r\n            <tr>\r\n                <td>");
#nullable restore
#line 22 "C:\Users\Soma\source\repos\MusorApp3\MusorApp3\Views\Login\Login.cshtml"
               Write(Html.LabelFor(a => a.Username));

#line default
#line hidden
#nullable disable
            WriteLiteral("</td>\r\n                <td>");
#nullable restore
#line 23 "C:\Users\Soma\source\repos\MusorApp3\MusorApp3\Views\Login\Login.cshtml"
               Write(Html.TextBoxFor(a => a.Username));

#line default
#line hidden
#nullable disable
            WriteLiteral("</td>\r\n                <td>");
#nullable restore
#line 24 "C:\Users\Soma\source\repos\MusorApp3\MusorApp3\Views\Login\Login.cshtml"
               Write(Html.ValidationMessageFor(a => a.Username));

#line default
#line hidden
#nullable disable
            WriteLiteral("</td>\r\n            </tr>\r\n            <tr>\r\n                <td>\r\n                    ");
#nullable restore
#line 28 "C:\Users\Soma\source\repos\MusorApp3\MusorApp3\Views\Login\Login.cshtml"
               Write(Html.LabelFor(a => a.Password));

#line default
#line hidden
#nullable disable
            WriteLiteral("\r\n                </td>\r\n                <td>\r\n                    ");
#nullable restore
#line 31 "C:\Users\Soma\source\repos\MusorApp3\MusorApp3\Views\Login\Login.cshtml"
               Write(Html.PasswordFor(a => a.Password));

#line default
#line hidden
#nullable disable
            WriteLiteral("\r\n                </td>\r\n                <td>\r\n                    ");
#nullable restore
#line 34 "C:\Users\Soma\source\repos\MusorApp3\MusorApp3\Views\Login\Login.cshtml"
               Write(Html.ValidationMessageFor(a => a.Password));

#line default
#line hidden
#nullable disable
            WriteLiteral(@"
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <input type=""submit"" value=""Login"" />
                </td>
                <td></td>
            </tr>
        </table>
    </fieldset>
");
#nullable restore
#line 46 "C:\Users\Soma\source\repos\MusorApp3\MusorApp3\Views\Login\Login.cshtml"
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
        public global::Microsoft.AspNetCore.Mvc.Rendering.IHtmlHelper<MusorApp3.Models.User> Html { get; private set; }
    }
}
#pragma warning restore 1591
