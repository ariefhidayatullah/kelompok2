#import "AppDelegate.h"
#import "GeneratedPluginRegistrant.h"

@implementation AppDelegate

- (BOOL)application:(UIApplication *)application
    didFinishLaunchingWithOptions:(NSDictionary *)launchOptions {
  [GeneratedPluginRegistrant registerWithRegistry:self];
  // Override point for customization after application launch.
  [GMSServices provideAPIKey: @"AIzaSyBRsiUfzAriqGa0cL-OpI7PZ90gH_LHr8A"]
  return [super application:application didFinishLaunchingWithOptions:launchOptions];
}

@end
