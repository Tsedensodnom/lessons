using System;

using Android.App;
using Android.Content.PM;
using Android.Runtime;
using Android.Views;
using Android.Widget;
using Android.OS;
using FFImageLoading.Forms.Droid;

namespace NewsApp.Droid
{
    [Activity(Label = "NewsApp", Icon = "@drawable/icon", Theme = "@style/MainTheme", MainLauncher = true, ConfigurationChanges = ConfigChanges.ScreenSize | ConfigChanges.Orientation)]
    public class MainActivity : global::Xamarin.Forms.Platform.Android.FormsAppCompatActivity
    {
        protected override void OnCreate(Bundle bundle)
        {
            TabLayoutResource = Resource.Layout.Tabbar;
            ToolbarResource = Resource.Layout.Toolbar;

            base.OnCreate(bundle);

            CachedImageRenderer.Init();
            Plugin.Iconize.Iconize.With(new Plugin.Iconize.Fonts.FontAwesomeModule());

            global::Xamarin.Forms.Forms.Init(this, bundle);

            FormsPlugin.Iconize.Droid.IconControls.Init(Resource.Id.toolbar, Resource.Id.sliding_tabs);

            LoadApplication(new App());
            return;

            LoadApplication(UXDivers.Gorilla.Droid.Player.CreateApplication(
                this,
                new UXDivers.Gorilla.Config("Gorilla on DESKTOP-ROLUI1J")
                  .RegisterAssemblyFromType<FFImageLoading.Transformations.BlurredTransformation>()
                  .RegisterAssemblyFromType<FFImageLoading.Forms.CachedImage>()
                  .RegisterAssemblyFromType<FormsPlugin.Iconize.IconImage>()
                ));
        }
    }
}


